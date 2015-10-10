<?php
require_once ("Mail.class.php");

class Mails {
    public $mail = array();
    public $size;
    
    /*
     * Function getId()
     *      Retorna o id do usuario
     * param void
     * return int
     */
    public function get() {
        $i = 0;
        $result = Dbcommand::select('tb_emails', array('ALL'), 'ORDER BY EM_ID DESC');
        while ($results = Dbcommand::arrays($result)) {
            $this->mail[$i] = new Mail();
            $this->mail[$i]->setId($results['EM_ID']);
            $this->mail[$i]->status = $results['EM_STATUS'];
            foreach ($results as $key => $value){
                $results[$key] = Criptografia::BASE64($value, 0);
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
    
    /*
     * Function addMailIndex()
     *      Retorna o email do usuario da index
     * param void
     * return int
     */
    public function addMailIndex() {
        $this->mail = new Mail();
        return $this->mail->setIndex();
    }
}
