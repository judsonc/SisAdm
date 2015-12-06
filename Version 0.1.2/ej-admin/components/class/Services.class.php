<?php
require_once ('Service.class.php');

/**
 * @brief Classe Services
 *      é onde ficará todos os serviços armazenados.
 *
 * @copyright \htmlonly<a href="https://github.com/judsonc">Judson Costa</a> e <a href="https://github.com/LeonardoJunio">Leonardo Junio</a>\endhtmlonly
 */
class Services {
    public $service = array();  /**< Array com todas os links */
    public $size;                     /**< Quantidade de links guardados */

    /**
     * @brief Function __construct
     *      chama o metodo get.
     * @param void
     * @return object
     */
    public function __construct() {
        $this->get();
    }

    /**
     * @brief Function get
     *      seleciona todos os campos do Banco de dados e retorna os valores das colunas ja descriptografado.
     * @param void
     * @return object
     */
    public function get() {
        $i = 0;
        $result = Dbcommand::select('tb_servicos', array('ALL'), 'ORDER BY SER_ID DESC');
        while ($results = Dbcommand::arrays($result)) {
            $this->service[$i] = new Service();
            $this->service[$i]->setId($results['SER_ID']);
            $this->service[$i]->setId_adm($results['SER_ID_ADM']);
            foreach ($results as $key => $value) {
                $results[$key] = Criptography::BASE64($value, 0);
            }
            $this->service[$i]->log = $results['SER_LOG'];
            $this->service[$i]->date_in = $results['SER_DATA'];
            $this->service[$i]->name = $results['SER_NOME'];
            $this->service[$i]->about = $results['SER_SOBRE'];
            $this->service[$i]->key = $results['SER_CHAVE'];

            $i++;
        }
        $this->size = $i;
        return $this;
    }

    /**
     * @brief Function addService
     *      adiciona um novo serviço no banco de dados.
     * @param id_adm do usuario logado
     * @return mensagem indicador de erro ou sucesso
     */
    public function addService($id_adm) {
        $moreService = new Service();
        return $moreService->set($id_adm);
    }
}
