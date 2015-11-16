<?php
include_once ("Criptografia.class.php");
include_once ('Dbcommand.class.php');
include_once ('ValidationData.class.php');

class Photo {
    private $id;
    private $id_adm;
    public $log;
    public $date_in;
    public $name;
    public $url;
    public $albumName;

    /*
     * Funcao set()
     *      Insere no Banco de dados todos os valores ja criptgrofado checando se o campo url nao esta vazio
     * param int, string
     * return int
     */
    public function set($id_adm, $url) {
        $this->id_adm = $id_adm;
        $this->name = Dbcommand::post("name_photo");
        $this->url = $url;

        if (!empty($this->name) && !ValidationData::text($this->name)) {
            return 18;
        }
        if (empty($this->url)) {
            return 7;
        } else {
            $this->name = Criptografia::BASE64($this->name, 1);
            $this->url = Criptografia::BASE64($this->url, 1);
            $this->albumName = Criptografia::BASE64($this->albumName, 1);
            $this->date_in = Criptografia::BASE64(date("Y-m-d H:i:s"), 1);
            $this->log = $this->date_in;
            Dbcommand::insert('tb_fotos', array('FOTO_ID_ADM', 'FOTO_DATA', 'FOTO_NOME', 'FOTO_NOME_ALBUM', 'FOTO_URL', 'FOTO_LOG'), array($this->id_adm, $this->date_in, $this->name, $this->albumName, $this->url, $this->log));
            return 6;
        }
    }

    /*
     * Function delete()
     *      Seleciona todos os campos do Banco de dados e retorna os valores das colunas ja descriptografado
     * param void
     * return int
     */
    public function delete() {
        Dbcommand::delete('tb_fotos', array('FOTO_ID' => $this->id));
        return 10;
    }

    /*
     * Function update()
     *      Seleciona todos os campos do Banco de dados e retorna os valores das colunas ja descriptografado, aceita nome da foto vazio
     * param int, string
     * return int
     */
    public function update($id_adm, $url = 1) {
        $this->id_adm = $id_adm;
        $this->name = Dbcommand::post("name_photo");

        if ($url != 1) {
            $this->url = $url;
        }

        if (!empty($this->name) && ValidationData::text($this->name) == false) {
            return 18;
        } else {
            $this->name = Criptografia::BASE64($this->name, 1);
            $this->url = Criptografia::BASE64($this->url, 1);
            $this->albumName = Criptografia::BASE64($this->albumName, 1);
            $this->log = Criptografia::BASE64(date("Y-m-d H:i:s"), 1);
            Dbcommand::update('tb_fotos', array('FOTO_ID_ADM' => $this->id_adm, 'FOTO_LOG' => $this->log, 'FOTO_NOME' => $this->name, 'FOTO_NOME_ALBUM' => $this->albumName, 'FOTO_URL' => $this->url), array('FOTO_ID' => $this->id));
            return 5;
        }
    }

    /*
     * Function get()
     *      Seleciona todos os campos do Banco de dados e retorna os valores das colunas ja descriptografado
     * param void
     * return object
     */
    public function setId($id) {
        $this->id = $id;
    }

    /*
     * Function get()
     *      Seleciona todos os campos do Banco de dados e retorna os valores das colunas ja descriptografado
     * param void
     * return object
     */
    public function getId() {
        return $this->id;
    }

    /*
     * Function get()
     *      Seleciona todos os campos do Banco de dados e retorna os valores das colunas ja descriptografado
     * param void
     * return object
     */
    public function setId_adm($id_adm) {
        $this->id_adm = $id_adm;
    }

    /*
     * Function getDir()
     *      Recupera o endereço da foto a partir do diretorio de onde o método é chamado, entrando na pasta "components/img" em seguida
     * param void
     * return string
     */
    public function getDir() {
        $url = explode('/', $this->url);
        $url = array_reverse($url);
        $dir = '';
        for ($i = 2; $i >= 0; $i--) {    // Pegar o endereço ate o diretorio "components" que eh o 3 nivel
            $dir .= '/' . $url[$i];  // Guardando apenas o link deste diretorio ate a img.
        }
        return $dir; // Sobe um diretorio a partir de onde o método é chamado
    }

    /*
     * Function getName()
     *      Verifica se o arquivo eh uma imagem, cria o nome e envia a imagem pro servidor e retorna o endereço da foto a partir do diretorio de onde o método é chamado, entrando na pasta "components/img" em seguida
     * param void
     * return string, int
     */
    static public function getSendName() {
        $name = explode(".", $_FILES['photo']['name']);
        $name = array_reverse($name);
        if (ValidationData::img($name[0])) { /*   Verificando se eh uma imagem   */
            $name = "/components/img/" . md5(time()) . "." . $name[0];      /*   Criando nome  || Depois  deixa só /img/ e apaga $path no DBcommands  */
            if (move_uploaded_file($_FILES['photo']['tmp_name'], ".." . $name)) { /*   Move a imagem   */
                return $name;
            } else {
                return 4;   /*   Falha ao enviar a imagem     */
            }
        } else {
            return 11;      /*   Arquivo invalido     */
        }
    }
}
