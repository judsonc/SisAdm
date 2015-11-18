<?php
include ('Bcrypt.class.php');

class Criptography extends Bcrypt {

    /*
     * Function Bcrypt()
     *      Criptografa a senha, retornando a string criptografada
     * param string
     * return string
     */
    public static function Bcrypt($password) {
        $hash = Bcrypt::hash($password);
        return $hash;
    }

    /*
     * Function CheckBcrypt()
     *      Verifica se a senha é correta, assim emitindo se ela é verdadeira ou falsa
     * param string, string
     * return bol
     */
    public static function CheckBcrypt($pass, $hash) {
        if (crypt($pass, $hash) === $hash) {
            return true;
        } else {
            return false;
        }
    }

    /* 0 descriptografa 1 criptografa */
    /*
     * Function BASE64()
     *      Dependo do valor do status (0 ou 1), a string é descriptografa ou criptografada, respectivamente
     * param string, string
     * return string
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
