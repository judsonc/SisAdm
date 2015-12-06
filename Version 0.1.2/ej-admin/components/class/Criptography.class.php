<?php
require_once ('Bcrypt.class.php');

/**
 * @brief Classe Criptography
 *      é responsável por (des)criptografar todos os dados.
 *
 * @copyright \htmlonly<a href="https://github.com/judsonc">Judson Costa</a> e <a href="https://github.com/LeonardoJunio">Leonardo Junio</a>\endhtmlonly
 */
abstract class Criptography extends Bcrypt {

    /**
     * @brief Function Bcrypt
     *      criptografa a senha, retornando a string criptografada, sendo criptografia de apenas uma via.
     * @param texto passado
     * @return texto criptografado
     */
    public static function Bcrypt($password) {
        $hash = Bcrypt::hash($password);
        return $hash;
    }

    /**
     * @brief Function CheckBcrypt
     *      verifica se a senha confere com o hash guardado no banco de dados.
     * @param senha criptografada digitada pelo usuario
     * @param senha criptografada recuperada do banco de dados
     * @return boolean
     */
    public static function CheckBcrypt($pass, $hash) {
        if (crypt($pass, $hash) === $hash) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * @brief Function BASE64
     *      dependo do valor do status (0 ou 1), a string é descriptografa ou criptografada, respectivamente.
     * @param string qualquer
     * @param status (0 -> descriptografia e -1 > criptografia)
     * @return string (des)criptografada
     */
    public static function BASE64($string, $status) {
        if ($status == '1') {
            $codificada = base64_encode($string);
            return $codificada;
        } else if ($status == '0') {
            $original = base64_decode($string);
            return $original;
        }
    }

}
