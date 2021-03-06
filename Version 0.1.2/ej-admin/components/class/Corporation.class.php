<?php
require_once ('Album.class.php');
require_once ('Services.class.php');
require_once ('Links.class.php');

/**
 * @brief Classe Corporation
 *     representa toda uma corporação com suas informações.
 *
 * @copyright \htmlonly<a href="https://github.com/judsonc">Judson Costa</a> e <a href="https://github.com/LeonardoJunio">Leonardo Junio</a>\endhtmlonly
 */
class Corporation {
    private $id;            /**< Senha do usuário */
    private $id_adm;    /**< Senha do usuário */
    private $name;      /**< Senha do usuário */
    public $log;            /**< Senha do usuário */
    public $album;       /**< Senha do usuário */
    public $adress;      /**< Senha do usuário */
    public $zip;            /**< Senha do usuário */
    public $square;      /**< Senha do usuário */
    public $city;           /**< Senha do usuário */
    public $state;         /**< Senha do usuário */
    public $country;     /**< Senha do usuário */
    public $phone1;     /**< Senha do usuário */
    public $phone2;     /**< Senha do usuário */
    public $mail;          /**< Senha do usuário */
    public $about;        /**< Senha do usuário */
    public $services;    /**< Senha do usuário */
    public $links;         /**< Senha do usuário */

    /**
     * @brief Function __construct
     *      instancia os objetos album, servicos e links.
     * @param void
     * @return void
     */
    public function __construct() {
        $this->get();
        $this->album = new Album('empresa');
        $this->services = new Services();
        $this->links = new Links();
    }

    /**
     * @brief Function setContact
     *      seta as informaoes de contato nas suas variaveis do banco de dados.
     * @param id_adm do usuario logado
     * @return mensagem indicador de erro ou sucesso
     */
    public function setContact($id_adm) {
        $this->id_adm = $id_adm;
        $this->adress = Dbcommand::post("adress_corporation");
        $this->zip = Dbcommand::post("zip_corporation");
        $this->square = Dbcommand::post("square_corporation");
        $this->city = Dbcommand::post("city_corporation");
        $this->state = Dbcommand::post("state_corporation");
        $this->country = Dbcommand::post("country_corporation");
        $this->phone1 = Dbcommand::post("phone1_corporation");
        $this->phone2 = Dbcommand::post("phone2_corporation");
        $this->mail = Dbcommand::post("mail_corporation");

        if (empty($this->adress) || empty($this->square) || empty($this->city) || empty($this->state) || empty($this->country)) {
            return "erro_campos";
        } elseif (!ValidationData::cep($this->zip) || !ValidationData::mail($this->mail) || !ValidationData::phone($this->phone1) || !ValidationData::phone($this->phone2) || !ValidationData::text($this->square) || !ValidationData::text($this->city) || !ValidationData::text($this->state) || !ValidationData::text($this->country) || !ValidationData::text($this->adress)) {
            return "erro_campo";
        } else {
            $this->adress = Criptography::BASE64($this->adress, 1);
            $this->city = Criptography::BASE64($this->city, 1);
            $this->country = Criptography::BASE64($this->country, 1);
            $this->mail = Criptography::BASE64($this->mail, 1);
            $this->square = Criptography::BASE64($this->square, 1);
            $this->phone1 = Criptography::BASE64($this->phone1, 1);
            $this->phone2 = Criptography::BASE64($this->phone2, 1);
            $this->state = Criptography::BASE64($this->state, 1);
            $this->zip = Criptography::BASE64($this->zip, 1);
            $this->log = Criptography::BASE64(date("Y-m-d H:i:s"), 1);
            Dbcommand::update('tb_empresa', array('EMP_ID_ADM' => $this->id_adm, 'EMP_DATA' => $this->log,
                'EMP_END' => $this->adress, 'EMP_CEP' => $this->zip,
                'EMP_BAIRRO' => $this->square, 'EMP_CIDADE' => $this->city,
                'EMP_ESTADO' => $this->state, 'EMP_PAIS' => $this->country,
                'EMP_TEL1' => $this->phone1, 'EMP_TEL2' => $this->phone2,
                'EMP_EMAIL' => $this->mail), array('EMP_ID' => $this->id));
            return "sucesso_alterar_dados";
        }
    }

    /**
     * @brief Function setAbout
     *      seta os dados em relação a informaçoes sobre a empresa.
     * @param id da corporacao
     * @return mensagem indicador de erro ou sucesso
     */
    public function setAbout($id) {
        $this->id_adm = $id;
        $this->about = Dbcommand::post("about_corporation");
        if (empty($this->about)) {
            return "erro_campos";
        } else {
            $this->about = Criptography::BASE64($this->about, 1);
            $this->log = Criptography::BASE64(date("Y-m-d H:i:s"), 1);
            Dbcommand::update('tb_empresa', array('EMP_ID_ADM' => $this->id_adm, 'EMP_DATA' => $this->log, 'EMP_SOBRE' => $this->about), array('EMP_ID' => $this->id));
            return "sucesso_alterar_dados";
        }
    }

    /**
     * @brief Function get
     *      pega as informaçoes referentes á contatos da corporacao.
     * @param void
     * @return void
     */
    public function get() {
        $result = Dbcommand::select('tb_empresa', array('ALL'), 'ORDER BY EMP_ID DESC LIMIT 1');
        $results = Dbcommand::rows($result);
        $this->id = $results['EMP_ID'];
        $this->id_adm = $results['EMP_ID_ADM'];
        foreach ($results as $key => $value) {
            $results[$key] = Criptography::BASE64($value, 0);
        }
        $this->name = $results['EMP_NOME'];
        $this->log = $results['EMP_DATA'];
        $this->adress = $results['EMP_END'];
        $this->zip = $results['EMP_CEP'];
        $this->square = $results['EMP_BAIRRO'];
        $this->city = $results['EMP_CIDADE'];
        $this->state = $results['EMP_ESTADO'];
        $this->country = $results['EMP_PAIS'];
        $this->phone1 = $results['EMP_TEL1'];
        $this->phone2 = $results['EMP_TEL2'];
        $this->mail = $results['EMP_EMAIL'];
        $this->about = str_replace('\r\n', '&#13;&#10;', $results['EMP_SOBRE']);

        return $this;
    }

    /**
     * @brief Function getName
     *      retorna o nome da companhia.
     * @param void
     * @return nome da companhia
     */
    public function getName() {
        return $this->name;
    }

    /**
     * @brief Function setName
     *      armazena o nome da empresa.
     * @param void
     * @return void
     */
    public function setName() {
        $this->name = Dbcommand::post('name_corporation');
        $this->name = Criptography::BASE64($this->name, 1);
        Dbcommand::insert('tb_empresa', array('EMP_NOME'), array($this->name));

        return $this;
    }

}
