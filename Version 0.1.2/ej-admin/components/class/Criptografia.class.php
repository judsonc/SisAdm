<?php

include("Bcrypt.class.php");

class Criptografia extends Bcrypt {

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
    static public function BASE64($string,$status){
        if($status == '1'){
            $codificada = base64_encode($string);
            return $codificada;
        }else if($status == '0'){
            $original = base64_decode($string);
            return $original;
        }
        
    }
    
}