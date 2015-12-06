<?php

/**
 * @brief Classe Person
 *      Contém os dados da pessoa.
 *
 * @copyright \htmlonly<a href="https://github.com/judsonc">Judson Costa</a> e <a href="https://github.com/LeonardoJunio">Leonardo Junio</a>\endhtmlonly
 */
class Person {
    protected $id;      /**< Identificação do usuario logado */
    public $name;      /**< Nome */
    public $mail_job;  /**< Email profissional */
    public $date_in;   /**< Data de criação da conta */
    public $log;         /**< Último acesso */
    public $phone;    /**< Telefone do usuario*/
}
