<?php

require_once ("Criptografia.class.php");
require_once ("Dbcommand.class.php");
require_once ("ValidationData.class.php");
require ("PHPMailer/PHPMailerAutoload.php");

class Mail {
    private $fromName = "Nome Exemplo";
    private $from     = "exemplo@exemplo.com";
    private $id;
    public $date_in;
    public $log;
    public $name;
    public $mail_job;
    public $title;
    public $phone;
    public $message;
    public $status = 1;     /* Nao lido */

    /*
     * Function setIndex()
     *      Envia o email do usuario na index do site
     * param void
     * return int
     */
    public function setIndex() {
        if (@$_POST) {
            $this->name     = Dbcommand::post('name');
            $this->mail_job = Dbcommand::post('mail');
            $this->phone    = Dbcommand::post('phone');
            $this->title    = Dbcommand::post('title');
            $this->message  = Dbcommand::post('message');

            if (empty($this->name) || empty($this->mail_job) || empty($this->message) || empty($this->title)) {
                echo "<script> window.alert('Campo vazio!!') </script>
	                <script> window.location = 'index.php'; </script>";
                die();
            }
            if (!ValidationData::name($this->name) || !ValidationData::mail($this->mail_job) || !ValidationData::text($this->message) || !ValidationData::text($this->title)) {
                echo "<script> window.alert('Campo em formato inv&aacute;lido!!') </script>
                	<script> window.location = 'index.php'; </script>";
                die();
            } else {
                $mail = new PHPMailer(); // Classe para enviar emails
                $mail->IsSMTP(); // Define que  a mensagem sera SMTP
                // Define o remetente
                $mail->From = $this->from; // Seu e-mail
                $mail->Sender = $this->from; // Seu e-mail
                $mail->FromName = $this->fromName; // Seu nome
                // Define os destinatario(s)
                $mail->AddAddress($this->from, $this->name);  // Sera pra propria
                $mail->AddCC($this->mail_job, "C&oacute;pia | " .$this->fromName); // Copia pro Usuario

                $mail->IsHTML(true); // Define que o e-mail sera enviado como HTML
                $mail->CharSet = 'utf-8'; // Charset da mensagem
                // Define a mensagem (Texto e Assunto)
                $mail->Subject  = $this->title;
                $mail->Body     = $this->message;
                $mail->AltBody  = trim(strip_tags($this->message)); // A mesma mensagem em texto puro

                $sended = $mail->Send(); // Envia o e-mail				 
                $mail->ClearAllRecipients(); // Limpa os destinatarios e os anexos

                $this->name     = Criptografia::BASE64($this->name, 1);
                $this->mail_job = Criptografia::BASE64($this->mail_job, 1);
                $this->phone    = Criptografia::BASE64($this->phone, 1);
                $this->title    = Criptografia::BASE64($this->title, 1);
                $this->message  = Criptografia::BASE64($this->message, 1);
                $this->date_in  = Criptografia::BASE64(date("Y-m-d H:i:s"), 1);

                Dbcommand::insert('tb_emails', 
                        array('EM_NOME', 'EM_EMAIL', 'EM_ASSUNTO', 'EM_MENSAGEM', 'EM_DATA', 'EM_TEL', 'EM_STATUS'), 
                        array($this->name, $this->mail_job, $this->title, $this->message, $this->date_in, $this->phone, $this->status));

                if ($sended) {
                    echo "<script> window.alert('Mensagem enviada com Sucesso') </script>
                    	 <script> window.location = 'index.php'; </script>";
                } else {
                    echo "<script> window.alert('Nao foi poss&iacute;vel enviar o e-mail,
                            mas ele podera ser visto pelo Administrador do Site.') </script>
                            <script> window.location = 'index.php'; </script>";
                    //echo "Informacoes do erro: " . $mail->ErrorInfo;
                }
            }
        }
    }
    
    /*
     * Function setRecovery()
     *      Retorna o id do usuario
     * param void
     * return int
     */
    public function setRecovery() {
        $this->mail_job = Dbcommand::post("email");
        if (!ValidationData::mail($this->mail_job)) {
            return 18;
        } else {
            $this->mail_job = Criptografia::BASE64($this->mail_job, 1);        
            $results = Dbcommand::select("tb_administradores", array('ADM_EMAIL' => $this->mail_job));
            if (Dbcommand::count_rows($results) == 1) {	/*  Verifica se o email esta cadastrado	*/
                $chave = sha1(uniqid(mt_rand(), true));
                /* Guardar este par de valores na tabela para confirmar mais tarde  */
                $check = Dbcommand::select("tb_recuperacao", array('REC_ADM' => $this->mail_job));
                if (Dbcommand::count_rows($check) > 0) {	/*  Verifica se o email ja solicitou a recuperacao  */
                    Dbcommand::update("tb_recuperacao", array('REC_CONFIRMACAO' => $chave), array('REC_ADM' => $this->mail_job));
                } else {
                    Dbcommand::insert("tb_recuperacao", array('REC_ADM', 'REC_CONFIRMACAO'), array($this->mail_job, $chave));
                }

                /*	  ====		Setando valores 	====	*/
                $link = $_SERVER['HTTP_HOST']. "/ej-admin/recuperar/recuperar.php?utilizador=$this->mail_job&confirmacao=$chave";
                $this->mail_job = Criptografia::BASE64($this->mail_job, 0);
                $this->title = "Recuperação de senha";
                $this->message = 'Olá ' .$this->mail_job. ', visite este link para recuperar a senha: ' .$link. '<br><br><br>
                                    Solicitação: ' .date("d/m/Y H:i:s", strtotime(date("Y-m-d H:i:s")));
                /*  	==========	    ==========		*/

                $mail = new PHPMailer();    /* Classe para enviar emails   */
                $mail->IsSMTP();    /* Define que a mensagem sera SMTP     */
                /*  Define o remetente   */
                $mail->From = $this->from; // Seu e-mail
                $mail->Sender = $this->from; // Seu e-mail
                $mail->FromName = $this->fromName; // Seu nome
                /* Define os destinatario(s)    */
                $mail->AddAddress($this->mail_job);  /* Sera para o solicitante */

                $mail->IsHTML(true); // Define que o e-mail sera enviado como HTML
                $mail->CharSet = 'utf-8'; // Charset da mensagem
                // Define a mensagem (Texto e Assunto)
                $mail->Subject = $this->title;
                $mail->Body = $this->message;

                $sended = $mail->Send(); // Envia o e-mail				 
                $mail->ClearAllRecipients(); // Limpa os destinatarios e os anexos

                if ($sended) {                
                    return 16;
                } else {                
                    return 17;
                }
            } else {            
                return 15;
            }
        }
    }
    
    /*
     * Function setSave()
     *      Retorna o id do usuario
     * param void
     * return int
     */        
    public function setSave() {
        /*	  ====		Setando valores 	====	*/
        $this->title = "Conta Ativada com Sucesso";
        $this->message = "Olá " .$this->mail_job. ",<br>
                            Sua conta foi ativada com sucesso, acesse o link para logar: <br>"
                            .$_SERVER['HTTP_HOST']. "/ej-admin<br>
                            Login: " .$this->name. "<br><br><br>
                            Solicitação: " .date('d/m/Y H:i:s', strtotime(date('Y-m-d H:i:s')));        		
        /*  	==========	    ==========		*/
        
        $mail = new PHPMailer(); // Classe para enviar emails
        $mail->IsSMTP(); // Define que  a mensagem sera SMTP
        // Define o remetente
        $mail->From = $this->from; // Seu e-mail
        $mail->Sender = $this->from; // Seu e-mail
        $mail->FromName = $this->fromName; // Seu nome 
        // Define os destinatario(s)
        $mail->AddAddress($this->mail_job);  // Sera pra o proprio usuario
        $mail->IsHTML(true); // Define que o e-mail sera enviado como HTML
        $mail->CharSet = 'utf-8'; // Charset da mensagem
	    
        $mail->Subject  = $this->title;
        $mail->Body     = $this->message;
        $mail->AltBody  = trim(strip_tags($this->message)); // A mesma mensagem em texto puro

        $mail->Send(); // Envia o e-mail				 
        $mail->ClearAllRecipients(); // Limpa os destinatarios e os anexos
        return 6;
    }

    /*
     * Function delete()
     *      Retorna o id do usuario
     * param void
     * return int
     */
    public function delete() {
        Dbcommand::delete('tb_emails', array('EM_ID' => $this->id));
        return 10;
    }

    /*
     * Function setStatus()
     *      Retorna o id do usuario
     * param void
     * return int
     */
    public function setStatus() {
        /*if ($this->status == 1) {
          Dbcommand::update('tb_emails', array('EM_STATUS' => 0), array('EM_ID' => $this->id));
          } else {
          ============     Usar depois pra botao "marcar como lido"  ======== */
        Dbcommand::update('tb_emails', array('EM_STATUS' => 0), array('EM_ID' => $this->id));
        return 5;
    }

    /*
     * Function getId()
     *      Retorna o id do usuario
     * param void
     * return int
     */
    public function getId() {
        return $this->id;
    }

    /*
     * Function setId()
     *      Armazena o id do usuario
     * param void
     * return int
     */
    public function setId($id) {
        $this->id = $id;
        return $this;
    }

}
