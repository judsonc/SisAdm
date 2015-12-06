<?php
require_once ('Criptography.class.php');
require_once ('Dbcommand.class.php');
require_once ('ValidationData.class.php');

/**
 * @brief Classe Photo
 *       é uma foto que tem nome, url e o nome do album a que pertence.
 *
 * @copyright \htmlonly<a href="https://github.com/judsonc">Judson Costa</a> e <a href="https://github.com/LeonardoJunio">Leonardo Junio</a>\endhtmlonly
 */
class Photo {
    private $id;                   /**< Identificação do link no banco de dados */
    private $id_adm;           /**< Identificação do usuario logado */
    public $date_in;             /**< Data de criação */
    public $log;                   /**< Data de alteração */
    public $name;               /**< Nome */
    public $url;                    /**< Endereço */
    public $albumName;      /**< Nome do album a que a foto pertence */

    /**
     * @brief Funcao set
     *      insere no Banco de dados todos os valores ja criptografado checando se o campo url nao esta vazio.
     * @param id_adm do usuario logado
     * @param url da imagem
     * @return mensagem indicador de erro ou sucesso
     */
    public function set($id_adm, $url) {
        $this->id_adm = $id_adm;
        $this->name = Dbcommand::post("name_photo");
        $this->url = $url;

        if (!empty($this->name) && !ValidationData::text($this->name)) {
            return "erro_campo";
        }
        if (empty($this->url)) {
            return "erro_campos";
        } else {
            $this->name = Criptography::BASE64($this->name, 1);
            $this->url = Criptography::BASE64($this->url, 1);
            $this->albumName = Criptography::BASE64($this->albumName, 1);
            $this->date_in = Criptography::BASE64(date("Y-m-d H:i:s"), 1);
            $this->log = $this->date_in;
            Dbcommand::insert('tb_fotos', array('FOTO_ID_ADM', 'FOTO_DATA', 'FOTO_NOME', 'FOTO_NOME_ALBUM', 'FOTO_URL', 'FOTO_LOG'), array($this->id_adm, $this->date_in, $this->name, $this->albumName, $this->url, $this->log));
            return "sucesso_cadastro";
        }
    }

    /**
     * @brief Function delete
     *      deleta fotos do banco de dados.
     * @param void
     * @return mensagem indicador de erro ou sucesso
     */
    public function delete() {
        Dbcommand::delete('tb_fotos', array('FOTO_ID' => $this->id));
        return "sucesso_deletar";
    }

    /**
     * @brief Function update
     *      seleciona todos os campos do Banco de dados e retorna os valores das colunas ja descriptografado, aceita nome da foto vazio.
     * @param  id_adm do usuario logado
     * @param url da imagem
     * @return mensagem indicador de erro ou sucesso
     */
    public function update($id_adm, $url = '') {
        $this->id_adm = $id_adm;
        $this->name = Dbcommand::post("name_photo");

        if ($url != '') {
            $this->url = $url;
        }

        if (!empty($this->name) && !ValidationData::text($this->name)) {
            return "erro_campo";
        } else {
            $this->name = Criptography::BASE64($this->name, 1);
            $this->url = Criptography::BASE64($this->url, 1);
            $this->albumName = Criptography::BASE64($this->albumName, 1);
            $this->log = Criptography::BASE64(date("Y-m-d H:i:s"), 1);
            Dbcommand::update('tb_fotos', array('FOTO_ID_ADM' => $this->id_adm, 'FOTO_LOG' => $this->log, 'FOTO_NOME' => $this->name, 'FOTO_NOME_ALBUM' => $this->albumName, 'FOTO_URL' => $this->url), array('FOTO_ID' => $this->id));
            return "sucesso_alterar_dados";
        }
    }

    /**
     * @brief Function setId
     *      seta o Id no banco de dados.
     * @param id do usuario logado
     * @return void
     */
    public function setId($id) {
        $this->id = $id;
    }

    /**
     * @brief Function getId
     *      retorna o Id.
     * @param void
     * @return  id da foto
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

    /**
     * @brief Function getDir
     *      recupera o endereço da foto a partir do diretorio de onde o método é chamado, entrando na pasta "components/img" em seguida.
     * @param void
     * @return o endereço ate o diretorio "components" que eh o 3 nivel.
     * Guardando apenas o link deste diretorio ate a img.
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

    /**
     * @brief Function getSendName
     *      verifica se o arquivo eh uma imagem, cria o nome e envia a imagem pro servidor.
     *      Retorna o endereço da foto a partir do diretorio de onde o método é chamado, entrando na pasta "components/img" em seguida.
     * @param void
     * @return mensagem indicador de erro ou sucesso
     */
    public static function getSendName() {
        $name = explode(".", $_FILES['photo']['name']);
        $name = array_reverse($name);
        if (ValidationData::img($name[0])) { /*   Verificando se eh uma imagem   */
            $name = "/components/img/" . md5(time()) . "." . $name[0];      /*   Criando nome */
            if (move_uploaded_file($_FILES['photo']['tmp_name'], ".." . $name)) { /*   Move a imagem   */
                return $name;
            } else {
                return ['ERRO' => "erro_acesso"];   /*   Falha ao enviar a imagem     */
            }
        } else {
            return ['ERRO' => "arquivo_invalido"];      /*   Arquivo invalido     */
        }
    }
}