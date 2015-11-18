<?php
require_once ('Criptography.class.php');
require_once ('Dbcommand.class.php');
require_once ('ValidationData.class.php');
require_once ('Album.class.php');

class Link {
    private $id;
    private $id_adm;
    public $date_in;
    public $log;
    public $name;
    public $about;
    public $url;
    public $album;
    public $key;   /*  Nome chave do album eh o primeiro nome do servico    */

    /*
     * Function set()
     *      seta todos os campos no Banco de dados e criptografando-os antes
     * param int
     * return int
     */
    public function set($id_adm) {
        $this->id_adm = $id_adm;
        $this->name = Dbcommand::post('name_link');
        $this->about = Dbcommand::post('about_link');
        $this->url = Dbcommand::post('url_link');
        $this->key = "LINK_" . date("d-H-i-s");
        $this->get();
        $this->album->addPhoto($this->id_adm);

        if (empty($this->name) || empty($this->url)) {
            return 7;
        }
        if (!ValidationData::text($this->name) || !ValidationData::text($this->url)) {
            return 18;
        } else {
            $this->name = Criptography::BASE64($this->name, 1);
            $this->about = Criptography::BASE64($this->about, 1);
            $this->url = Criptography::BASE64($this->url, 1);
            $this->date_in = Criptography::BASE64(date("Y-m-d H:i:s"), 1);
            $this->log = $this->date_in;
            $this->key = Criptography::BASE64($this->key, 1);
            Dbcommand::insert('tb_links', array('LINK_ID_ADM', 'LINK_DATA', 'LINK_LOG', 'LINK_NOME', 'LINK_SOBRE', 'LINK_CHAVE', 'LINK_URL'), array($this->id_adm, $this->date_in, $this->log, $this->name, $this->about, $this->key, $this->url));
            return 6;
        }
    }

     /*
     * Function delete()
     *      Deleta campo no banco de dados
     * param void
     * return int
     */
    public function delete() {
        $this->album->delete();
        Dbcommand::delete('tb_links', array('LINK_ID' => $this->id));
        return 10;
    }

    /*
     * Function update()
     *       Atualiza os valores no Banco de dados e criptografa caso ainda nao esteja
     * param int, int
     * return int
     */
    public function update($id_adm, $url = 1) {
        $this->id_adm = $id_adm;
        $this->name = Dbcommand::post("name_link");
        $this->about = Dbcommand::post("about_link");
        $this->url = Dbcommand::post('url_link');

        for ($i = 0; $i < $this->album->size; $i++) {
            $this->album->photo[$i]->update($this->id_adm, $url);
        }

        if (!ValidationData::text($this->name) || !ValidationData::text($this->url)) {
            return 18;
        } else {
            $this->name = Criptography::BASE64($this->name, 1);
            $this->about = Criptography::BASE64($this->about, 1);
            $this->url = Criptography::BASE64($this->url, 1);
            $this->log = Criptography::BASE64(date("Y-m-d H:i:s"), 1);
            Dbcommand::update('tb_links', array('LINK_ID_ADM' => $this->id_adm, 'LINK_LOG' => $this->log, 'LINK_NOME' => $this->name, 'LINK_SOBRE' => $this->about, 'LINK_URL' => $this->url), array('LINK_ID' => $this->id));
            return 5;
        }
    }

    /*
     * Function get()
     *      Retorna os campos da classe Album
     * param void
     * return object
     */
    public function get() {
        $this->album = new Album($this->key);
        return $this->album;
    }

    /*
     * Function setId()
     *      Seta o id
     * param int
     * return void
     */
    public function setId($id) {
        $this->id = $id;
    }

    /*
     * Function getId()
     *      Retorna id
     * param void
     * return object
     */
    public function getId() {
        return $this->id;
    }

    /*
     * Function setId_adm()
     *      Seta o Id do administrador
     * param int
     * return void
     */
    public function setId_adm($id_adm) {
        $this->id_adm = $id_adm;
    }

}
