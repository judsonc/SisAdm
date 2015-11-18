<?php
require_once ('Criptography.class.php');
require_once ('Dbcommand.class.php');
require_once ('ValidationData.class.php');
require_once ('Album.class.php');

class Service {
    private $id;
    private $id_adm;
    public $date_in;
    public $log;
    public $name;
    public $about;
    public $album;
    public $key;   /*  Nome chave do album eh o primeiro nome do servico    */

    /*
     * Function set()
     *      Insere no Banco de dados informaoes sobre "serviços" e criptografa
     * param int
     * return int
     */
    public function set($id_adm) {
        $this->id_adm = $id_adm;
        $this->name = Dbcommand::post('name_service');
        $this->about = Dbcommand::post('about_service');
        $this->key = "SER_" . date("d-H-i-s");
        $this->get();
        $this->album->addPhoto($this->id_adm);

        if (empty($this->name)) {
            return 7;
        }
        if (!ValidationData::text($this->name)) {
            return 18;
        } else {
            $this->name = Criptography::BASE64($this->name, 1);
            $this->about = Criptography::BASE64($this->about, 1);
            $this->date_in = Criptography::BASE64(date("Y-m-d H:i:s"), 1);
            $this->log = $this->date_in;
            $this->key = Criptography::BASE64($this->key, 1);
            Dbcommand::insert('tb_servicos', array('SER_ID_ADM', 'SER_DATA', 'SER_LOG', 'SER_NOME', 'SER_SOBRE', 'SER_CHAVE'), array($this->id_adm, $this->date_in, $this->log, $this->name, $this->about, $this->key));
            return 6;
        }
    }

    /*
     * Function delete()
     *      Deleta "serviços"do banco de dados
     * param void
     * return int
     */
    public function delete() {
        $this->album->delete();
        Dbcommand::delete('tb_servicos', array('SER_ID' => $this->id));
        return 10;
    }

    /*
     * Function update()
     *      Seleciona todos os campos do Banco de dados e retorna os valores das colunas ja descriptografado
     * param int, int
     * return int
     */
    public function update($id_adm, $url = 1) {
        $this->id_adm = $id_adm;
        $this->name = Dbcommand::post("name_service");
        $this->about = Dbcommand::post("about_service");

        for ($i = 0; $i < $this->album->size; $i++) {
            $this->album->photo[$i]->update($this->id_adm, $url);
        }

        if (!ValidationData::text($this->name)) {
            return 18;
        } else {
            $this->name = Criptography::BASE64($this->name, 1);
            $this->about = Criptography::BASE64($this->about, 1);
            $this->log = Criptography::BASE64(date("Y-m-d H:i:s"), 1);
            Dbcommand::update('tb_servicos', array('SER_ID_ADM' => $this->id_adm, 'SER_LOG' => $this->log, 'SER_NOME' => $this->name, 'SER_SOBRE' => $this->about), array('SER_ID' => $this->id));
            return 5;
        }
    }

    /*
     * Function get()
     *      Seleciona o campos do Banco de dados e o retorna
     * param void
     * return object
     */
    public function get() {
        $this->album = new Album($this->key);
        return $this->album;
    }

    /*
     * Function setId()
     *      Seta o Id no banco de dados
     * param int
     * return void
     */
    public function setId($id) {
        $this->id = $id;
    }

    /*
     * Function getId()
     *      Retorna o Id
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
