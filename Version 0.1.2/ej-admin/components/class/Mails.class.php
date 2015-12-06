<?php
require_once ('Mail.class.php');

/**
 * @brief Classe Mails
 *      é onde ficará  todos os emails armazenados.
 *
 * @copyright \htmlonly<a href="https://github.com/judsonc">Judson Costa</a> e <a href="https://github.com/LeonardoJunio">Leonardo Junio</a>\endhtmlonly
 */
class Mails {
    public $mail = array(); /**< Array com todos os emails */
    public $size;                /**< Quantidade de emails guardados */

    /**
     * @brief Function get
     *      seleciona todos os campos do Banco de dados e retorna os valores das colunas ja descriptografado.
     * @param void
     * @return void
     */
    public function get() {
        $i = 0;
        $result = Dbcommand::select('tb_emails', array('ALL'), 'ORDER BY EM_ID DESC');
        while ($results = Dbcommand::arrays($result)) {
            $this->mail[$i] = new Mail();
            $this->mail[$i]->setId($results['EM_ID']);
            $this->mail[$i]->status = $results['EM_STATUS'];
            foreach ($results as $key => $value) {
                $results[$key] = Criptography::BASE64($value, 0);
            }
            $this->mail[$i]->date_in = $results['EM_DATA'];
            $this->mail[$i]->name = $results['EM_NOME'];
            $this->mail[$i]->mail_job = $results['EM_EMAIL'];
            $this->mail[$i]->title = $results['EM_ASSUNTO'];
            $this->mail[$i]->message = $results['EM_MENSAGEM'];
            $this->mail[$i]->phone = $results['EM_TEL'];

            $i++;
        }
        $this->size = $i;
        return $this;
    }

    /**
     * @brief Function addMailIndex
     *      retorna o email do usuario da index.
     * @param void
     * @return mensagem indicador de erro ou sucesso
     */
    public function addMailIndex() {
        $this->mail = new Mail();
        return $this->mail->setIndex();
    }
}
