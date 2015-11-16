<?php
include("Bcrypt.class.php");

class Criptografia extends Bcrypt {
    
    /*
     * Function get()
     *      Seleciona todos os campos do Banco de dados e retorna os valores das colunas ja descriptografado
     * param void
     * return object
     */
    static public function Bcrypt($password) {
        $hash = Bcrypt::hash($password);
        return $hash;
    }

    /*
     * $password -> é a senha digitada pelo usuario, vinda do formulario 
     * $hash -> é o valor hasheado inserido no banco, senha que esta no banco      
     */
    static public function CheckBcrypt($pass, $hash) {
        if (crypt($pass, $hash) === $hash) {
            return true;
        } else {
            return false;
        }
    }

    /* 0 descriptografa 1 criptografa */
    /*
     * Function get()
     *      Seleciona todos os campos do Banco de dados e retorna os valores das colunas ja descriptografado
     * param void
     * return object
     */
    static public function BASE64($string, $status) {
        if ($status == '1') {
            $codificada = base64_encode($string);
            return $codificada;
        } else if ($status == '0') {
            $original = base64_decode($string);
            return $original;
        }
    }

}
