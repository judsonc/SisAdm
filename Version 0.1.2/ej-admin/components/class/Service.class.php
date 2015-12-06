<?php
require_once ('Criptography.class.php');
require_once ('Dbcommand.class.php');
require_once ('ValidationData.class.php');
require_once ('Album.class.php');

/**
 * @brief Classe Service
 *      é um serviço que tem nome, texto e logo.
 *
 * @copyright \htmlonly<a href="https://github.com/judsonc">Judson Costa</a> e <a href="https://github.com/LeonardoJunio">Leonardo Junio</a>\endhtmlonly
 */
class Service {
    private $id;             /**< Identificação do serviço no banco de dados */
    private $id_adm;     /**< Identificação do usuario logado */
    public $date_in;       /**< Data de criação */
    public $log;             /**< Data de alteração */
    public $name;         /**< Nome */
    public $about;         /**< Texto de descrição */
    public $album;        /**< Album de fotos com a logo */
    public $key;            /**< Nome chave do servico eh "SER_data_criacao" */

    /**
     * @brief Function set
     *      insere no Banco de dados informacoes sobre o "serviço" ja criptografado.
     * @param id_adm do usuario logado
     * @return mensagem indicador de erro ou sucesso
     */
    public function set($id_adm) {
        $this->id_adm = $id_adm;
        $this->name = Dbcommand::post('name_service');
        $this->about = Dbcommand::post('about_service');
        $this->key = "SER_" . date("d-H-i-s");
        $this->get();
        $this->album->addPhoto($this->id_adm);

        if (empty($this->name)) {
            return "erro_campos";
        }
        if (!ValidationData::text($this->name)) {
            return "erro_campo";
        } else {
            $this->name = Criptography::BASE64($this->name, 1);
            $this->about = Criptography::BASE64($this->about, 1);
            $this->date_in = Criptography::BASE64(date("Y-m-d H:i:s"), 1);
            $this->log = $this->date_in;
            $this->key = Criptography::BASE64($this->key, 1);
            Dbcommand::insert('tb_servicos', array('SER_ID_ADM', 'SER_DATA', 'SER_LOG', 'SER_NOME', 'SER_SOBRE', 'SER_CHAVE'), array($this->id_adm, $this->date_in, $this->log, $this->name, $this->about, $this->key));
            return "sucesso_cadastro";
        }
    }

    /**
     * @brief Function delete
     *      deleta "serviços"do banco de dados.
     * @param void
     * @return mensagem indicador de erro ou sucesso
     */
    public function delete() {
        $this->album->delete();
        Dbcommand::delete('tb_servicos', array('SER_ID' => $this->id));
        return "sucesso_deletar";
    }

    /**
     * @brief Function update
     *      seleciona todos os campos do Banco de dados e retorna os valores das colunas ja descriptografado.
     * @param id_adm do usuario logado
     * @param url da imagem
     * @return mensagem indicador de erro ou sucesso
     */
    public function update($id_adm, $url = 1) {
        $this->id_adm = $id_adm;
        $this->name = Dbcommand::post("name_service");
        $this->about = Dbcommand::post("about_service");

        for ($i = 0; $i < $this->album->size; $i++) {
            $this->album->photo[$i]->update($this->id_adm, $url);
        }

        if (!ValidationData::text($this->name)) {
            return "erro_campo";
        } else {
            $this->name = Criptography::BASE64($this->name, 1);
            $this->about = Criptography::BASE64($this->about, 1);
            $this->log = Criptography::BASE64(date("Y-m-d H:i:s"), 1);
            Dbcommand::update('tb_servicos', array('SER_ID_ADM' => $this->id_adm, 'SER_LOG' => $this->log, 'SER_NOME' => $this->name, 'SER_SOBRE' => $this->about), array('SER_ID' => $this->id));
            return "sucesso_alterar_dados";
        }
    }

    /**
     * @brief Function get
     *     retorna o album de fotos do servico.
     * @param void
     * @return object
     */
    public function get() {
        $this->album = new Album($this->key);
        return $this->album;
    }

    /**
     * @brief Function setId
     *      seta o Id do servico.
     * @param id do servico
     * @return void
     */
    public function setId($id) {
        $this->id = $id;
    }

    /**
     * @brief Function getId
     *      retorna o Id.
     * @param void
     * @return id do servico
     */
    public function getId() {
        return $this->id;
    }

    /**
     * @brief Function setId_adm
     *      seta o Id do administrador.
     * @param  id_adm do usuario logado
     * @return void
     */
    public function setId_adm($id_adm) {
        $this->id_adm = $id_adm;
    }
}
