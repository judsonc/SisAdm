<?php
require_once ("Person.class.php");
require_once ("Mails.class.php");

class User extends Person {
    private $password;
    private $login;
    private $status = 2; // usuario ativo
    public $mails;


    /*
     * Function get()
     *      Seleciona todos os campos do Banco de dados e atribui os valores das colunas aos atributos da classe ja descriptografado
     * param void
     * return object
     */    
    public function get(){
        $result 	= Dbcommand::select('tb_administradores', array('ADM_ID' => $this->id));
        $results 	= Dbcommand::rows($result);
        foreach ($results as $key => $value){
            @$results[$key] = @Criptografia::BASE64(@$value, 0);
        }
        $this->name 	= $results['ADM_NOME'];
        $this->login 	= $results['ADM_LOGIN'];
        $this->password = $results['ADM_SENHA'];
        $this->mail_job = $results['ADM_EMAIL'];
        $this->date_in 	= $results['ADM_DATA'];
        $this->log 		= $results['ADM_LOG'];
        
        $this->mails = new Mails();
        return $this;
    }
    
    /*
     * Function update()
     *      Atualiza no Banco de dados todos os valores já criptgrofado checando se o texto nao esta vazio
     * param void
     * return int
     */
    public function update(){
        $this->name 	= Dbcommand::post("name_user");
        $this->mail_job = Dbcommand::post("mail_job_user");
        
        if (empty($this->name) || empty($this->mail_job)){
            return 7;            
        }
        
        if (!ValidationData::mail($this->mail_job) || !ValidationData::name($this->name)) {
            return 18;            
        }else{
            $this->name     = Criptografia::BASE64($this->name, 1);
            $this->mail_job = Criptografia::BASE64($this->mail_job, 1);
            $this->log      = Criptografia::BASE64(date("Y-m-d H:i:s"), 1);
            $this->password = Dbcommand::post("password1_user");
            $passtmp        = Dbcommand::post("password2_user");
            if (!empty($this->password) && !empty($passtmp)){
                if ($this->password !== $passtmp){
                    return 9;
                }else{
                    $this->password = Criptografia::Bcrypt($this->password);
                    Dbcommand::update('tb_administradores', 
                            array('ADM_NOME' => $this->name,'ADM_LOG' => $this->log,
                                  'ADM_EMAIL' => $this->mail_job, 'ADM_SENHA' => $this->password), 
                            array('ADM_ID' => $this->id));
                    return 5;
                }
            }else{
                Dbcommand::update('tb_administradores', 
                        array('ADM_NOME' => $this->name,'ADM_LOG' => $this->log, 'ADM_EMAIL' => $this->mail_job), 
                        array('ADM_ID' => $this->id));
                return 5;
            }        
        }
    }
    
    /*
     * Function getId()
     *      Retorna o id do usuario
     * param void
     * return int
     */    
    public function getId(){
        return $this->id;
    }

    /*
     * Function setId()
     *      Armazena o id do usuario
     * param void
     * return int
     */    
    public function setId($id){
        $this->id = $id;
        return $this;
    }
    
    /*
     * Function set()
     *      Insere no Banco de dados todos os valores já criptgrofado checando se o texto nao esta vazio
     * param void
     * return boolean
     */
    public function set(){
        $this->name 	= Dbcommand::post("name_user");
        $this->login 	= Dbcommand::post("username_user");
        $this->mail_job = Dbcommand::post("mail_job_user");
        $this->password = Dbcommand::post("password1_user");
        
        if (empty($this->password) || $this->password !== Dbcommand::post('password2_user')){
            return 9;
        }else{
            $this->password = Criptografia::Bcrypt($this->password);
        }
        
        if (!ValidationData::username($this->login) || !ValidationData::mail($this->mail_job) || !ValidationData::name($this->name)) {
            return 18;            
        }
        $this->login = Criptografia::BASE64($this->login, 1);
        $result = Dbcommand::select('tb_administradores', array('ADM_LOGIN' => $this->login));
        if (Dbcommand::count_rows($result) > 0){
            return 8;
        }else{
            $mail = new Mail();  // Envia notificacao para o usuario informando que a conta foi ativada
            $mail->name = Dbcommand::post("username_user");
            $mail->mail_job = $this->mail_job;
            $mail->setSave();
            
            $this->name     = Criptografia::BASE64($this->name, 1);
            $this->mail_job = Criptografia::BASE64($this->mail_job, 1);
            $this->date_in  = Criptografia::BASE64(date("Y-m-d H:i:s"), 1);            
            Dbcommand::insert('tb_administradores', 
                    array('ADM_DATA', 'ADM_NOME', 'ADM_SENHA', 'ADM_LOGIN', 'ADM_EMAIL', 'ADM_STATUS'), 
                    array($this->date_in, $this->name, $this->password, $this->login, $this->mail_job, $this->status));
            return 6;
        }
    }

    /*
     * Function login()
     *      Verifica os dados de entrada e valida caso o usuario esteja cadastrado e ativo, assim recebendo do banco os dados criptografados
     * param void
     * return boolean, int
     */
    public function login(){
        $this->login 	= Dbcommand::post("username_user");
        $this->password = Dbcommand::post("password_user");
        if (!empty($this->login) && !empty($this->password)) {
            $this->login = Criptografia::BASE64($this->login, 1);
            $result = Dbcommand::select('tb_administradores', array('ADM_LOGIN' => $this->login));
            if (Dbcommand::count_rows($result) > 0) {
                $results = Dbcommand::rows($result);
                if (Criptografia::CheckBcrypt($this->password, $results['ADM_SENHA']) == FALSE) {                    
                    return 12;
                }else {
                    $this->setId($results['ADM_ID']);
                    $this->status = $results['ADM_STATUS'];
                    if ($this->status != 2) {
                        return 3;
                    } else {
                        if (!isset($_SESSION)) {
                            session_start();
                            // seta configurações fuso horario e tempo limite de inatividade em segundos
                            date_default_timezone_set("Brazil/East");
                            $tempolimite = 3600;
                            //fim das configurações de fusu horario e limite de inatividade
                            //aqui ta o seu script de autenticação no momento em que ele for validado você seta as configurações abaixo.
                            //seta as configurações de tempo permitido para inatividade
                            $_SESSION['registro'] = time(); // armazena o momento em que autenticado
                            $_SESSION['limite'] = $tempolimite; // armazena o tempo limite sem atividade
                            // fim das configurações de tempo inativo
                        }
                        $_SESSION['usuario_logado'] = $this->getId();
                        $this->log = Criptografia::BASE64(date("Y-m-d H:i:s"), 1);
                        Dbcommand::update('tb_administradores', array('ADM_LOG' => $this->log), array('ADM_ID' => $this->id));
                        return 20;
                    }
                }
            }else {
                return 2;
            }
        }else {
            return 7;
        }        
    }
    
    /*
     * Function sendMail()
     *      Verifica os dados de entrada e valida caso o estajam corretos, e em seguida guarda a mensagem no banco
     * param void
     * return void
     */    
    public function sendMail(){
        $this->mails = new Mails();
        return $this->mails->addMailIndex();
    }   
    
}

    /*
    function save($name,$password,$login,$mail_job,$date){
        $this->name = $name;
        $this->password = $password;
        $this->login = $login;
        $this->mail_job = $mail_job;
        $this->date_in = $date;

        $this->sql_query("INSERT INTO tb_administradores (ADM_NOME, ADM_LOGIN, ADM_SENHA, ADM_EMAIL, ADM_DATA, ADM_LOG, ADM_STATUS) VALUES ('$this->name', '$this->login', '$this->password', '$this->mail_job', '$this->date_in', '', '$this->status')");
        
    }
    
    function enable_user($id){
        $this->sql_query("UPDATE tb_administradores SET ADM_STATUS=2 WHERE ADM_ID='$id'");
        echo $id;
    }
    
    function disable_user(){
        $this->sql_query("UPDATE tb_administradores SET ADM_STATUS=3 WHERE ADM_ID='$this->id'");
    }

    function hour_save($hour1,$hour2,$obs){
        $this->sql_query("UPDATE tb_administradores SET ADM_HORARIO1='$hour1',ADM_HORARIO2='$hour2' WHERE ADM_ID='$this->id'");
    }

    function hour_free($hours,$obs){
       $this->sql_query("UPDATE tb_administradores SET ADM_HORARIOS='$hours', ADM_OBS='$obs' WHERE ADM_ID='$this->id'");
    }*/
