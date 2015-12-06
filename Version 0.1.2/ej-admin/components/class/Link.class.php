<?php
require_once ('Criptography.class.php');
require_once ('Dbcommand.class.php');
require_once ('ValidationData.class.php');
require_once ('Album.class.php');

/**
 * @brief Classe Link
 *      é um link que tem nome, url, texto e logo.
 *
 * @copyright \htmlonly<a href="https://github.com/judsonc">Judson Costa</a> e <a href="https://github.com/LeonardoJunio">Leonardo Junio</a>\endhtmlonly
 */
class Link {
    private $id;            /**< Identificação do link no banco de dados */
    private $id_adm;    /**< Identificação do usuario logado */
    public $date_in;      /**< Data de criação */
    public $log;            /**< Data de alteração */
    public $name;        /**< Nome */
    public $about;        /**< Texto de descrição */
    public $url;             /**< Endereço */
    public $album;        /**< Album de fotos com a logo */
    public $key;           /**< A palavra chave do album eh "LINK_data_criacao" */

    /**
     * @brief Function set
     *      seta todos os campos no Banco de dados e criptografando-os antes.
     * @param id_adm do usuario logado
     * @return mensagem indicador de erro ou sucesso
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
            return "erro_campos";
        }
        if (!ValidationData::text($this->name) || !ValidationData::text($this->url)) {
            return "erro_campo";
        } else {
            $this->name = Criptography::BASE64($this->name, 1);
            $this->about = Criptography::BASE64($this->about, 1);
            $this->url = Criptography::BASE64($this->url, 1);
            $this->date_in = Criptography::BASE64(date("Y-m-d H:i:s"), 1);
            $this->log = $this->date_in;
            $this->key = Criptography::BASE64($this->key, 1);
            Dbcommand::insert('tb_links', array('LINK_ID_ADM', 'LINK_DATA', 'LINK_LOG', 'LINK_NOME', 'LINK_SOBRE', 'LINK_CHAVE', 'LINK_URL'), array($this->id_adm, $this->date_in, $this->log, $this->name, $this->about, $this->key, $this->url));
            return "sucesso_cadastro";
        }
    }

     /**
     * @brief Function delete
     *      deleta campo no banco de dados.
     * @param void
     * @return mensagem indicador de erro ou sucesso
     */
    public function delete() {
        $this->album->delete();
        Dbcommand::delete('tb_links', array('LINK_ID' => $this->id));
        return "sucesso_deletar";
    }

    /**
     * @brief Function update
     *       atualiza os valores no Banco de dados e criptografa caso ainda nao esteja.
     * @param id_adm do usuario logado
     * @param url da imagem
     * @return mensagem indicador de erro ou sucesso
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
            return "erro_campo";
        } else {
            $this->name = Criptography::BASE64($this->name, 1);
            $this->about = Criptography::BASE64($this->about, 1);
            $this->url = Criptography::BASE64($this->url, 1);
            $this->log = Criptography::BASE64(date("Y-m-d H:i:s"), 1);
            Dbcommand::update('tb_links', array('LINK_ID_ADM' => $this->id_adm, 'LINK_LOG' => $this->log, 'LINK_NOME' => $this->name, 'LINK_SOBRE' => $this->about, 'LINK_URL' => $this->url), array('LINK_ID' => $this->id));
            return "sucesso_alterar_dados";
        }
    }

    /**
     * @brief Function get
     *      retorna os campos da classe Album.
     * @param void
     * @return object
     */
    public function get() {
        $this->album = new Album($this->key);
        return $this->album;
    }

    /**
     * @brief Function setId
     *      seta o id.
     * @param id do link
     * @return void
     */
    public function setId($id) {
        $this->id = $id;
    }

    /**
     * @brief Function getId
     *      retorna id.
     * @param void
     * @return id do link
     */
    public function getId() {
        return $this->id;
    }

    /**
     * @brief Function setId_adm
     *      seta o Id do administrador.
     * @param id_adm do usuario logado
     * @return void
     */
    public function setId_adm($id_adm) {
        $this->id_adm = $id_adm;
    }

}
