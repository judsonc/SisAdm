<?php
require_once ('Link.class.php');

class Links {
    public $link = array();
    public $size;

    /*
     * Function get()
     *      Seleciona todos os campos do Banco de dados e retorna os valores das colunas ja descriptografado
     * param void
     * return object
     */
    public function __construct() {
        $this->get();
    }

    /*
     * Function get()
     *      Seleciona todos os campos do Banco de dados e retorna os valores das colunas ja descriptografado
     * param void
     * return object
     */
    public function get() {
        $i = 0;
        $result = Dbcommand::select('tb_links', array('ALL'), 'ORDER BY LINK_ID DESC');
        while ($results = Dbcommand::arrays($result)) {
            $this->link[$i] = new Link();
            $this->link[$i]->setId($results['LINK_ID']);
            $this->link[$i]->setId_adm($results['LINK_ID_ADM']);
            foreach ($results as $key => $value) {
                $results[$key] = Criptografia::BASE64($value, 0);
            }
            $this->link[$i]->log = $results['LINK_LOG'];
            $this->link[$i]->date_in = $results['LINK_DATA'];
            $this->link[$i]->name = $results['LINK_NOME'];
            $this->link[$i]->about = $results['LINK_SOBRE'];
            $this->link[$i]->key = $results['LINK_CHAVE'];
            $this->link[$i]->url = $results['LINK_URL'];

            $i++;
        }
        $this->size = $i;
        return $this;
    }

    /*
     * Function get()
     *      Seleciona todos os campos do Banco de dados e retorna os valores das colunas ja descriptografado
     * param void
     * return object
     */
    public function addLink($id_adm) {
        $moreLink = new Link();
        return $moreLink->set($id_adm);
    }
}
