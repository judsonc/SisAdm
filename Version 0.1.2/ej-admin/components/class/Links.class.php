<?php
require_once ('Link.class.php');

/**
 * @brief Classe Links
 *      é onde ficará todos os links armazenados.
 *
 * @copyright \htmlonly<a href="https://github.com/judsonc">Judson Costa</a> e <a href="https://github.com/LeonardoJunio">Leonardo Junio</a>\endhtmlonly
 */
class Links {
    public $link = array(); /**< Array com todas os links */
    public $size;               /**< Quantidade de links guardados */

    /**
     * @brief Function __construct
     *      chama o metodo get.
     * @param void
     * @return void
     */
    public function __construct() {
        $this->get();
    }

    /**
     * @brief Function get
     *      seleciona todos os campos do Banco de dados e retorna os valores ja descriptografado.
     * @param void
     * @return object
     */
    public function get() {
        $i = 0;
        $result = Dbcommand::select('tb_links', array('ALL'), 'ORDER BY LINK_ID DESC');
        while ($results = Dbcommand::arrays($result)) {
            $this->link[$i] = new Link();
            $this->link[$i]->setId($results['LINK_ID']);
            $this->link[$i]->setId_adm($results['LINK_ID_ADM']);
            foreach ($results as $key => $value) {
                $results[$key] = Criptography::BASE64($value, 0);
            }
            $this->link[$i]->log = $results['LINK_LOG'];
            $this->link[$i]->date_in = $results['LINK_DATA'];
            $this->link[$i]->name = $results['LINK_NOME'];
            $this->link[$i]->about = str_replace('\r\n', '&#13;&#10;', $results['LINK_SOBRE']);
            $this->link[$i]->key = $results['LINK_CHAVE'];
            $this->link[$i]->url = $results['LINK_URL'];

            $i++;
        }
        $this->size = $i;
        return $this;
    }

    /**
     * @brief Function addLink
     *      adiciona um novo link.
     * @param id_adm do usuario logado
     * @return mensagem indicador de erro ou sucesso
     */
    public function addLink($id_adm) {
        $moreLink = new Link();
        return $moreLink->set($id_adm);
    }
}
