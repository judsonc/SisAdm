<?php

class ValidationData {

    public static function img($ext) {
        // Verifica se a extensão é de um dos tipo do array, return boolean;
        $image = array('jpg', 'png', 'gif', 'jpeg', 'svg', 'JPG', 'PNG', 'GIF', 'JPEG', 'SVG');
        return in_array($ext, $image);
    }

    public static function cpf($cpf) {
        // Verifica se um número foi informado
        if (empty($cpf)) {
            return false;
        }

        // Elimina possivel mascara
        $cpf = ereg_replace('[^0-9]', '', $cpf);
        $cpf = str_pad($cpf, 11, '0', STR_PAD_LEFT);

        // Verifica se o numero de digitos informados é igual a 11 
        if (strlen($cpf) != 11) {
            return false;
        }
        // Verifica se nenhuma das sequências invalidas abaixo 
        // foi digitada. Caso afirmativo, retorna falso
        else if ($cpf == '00000000000' ||
                $cpf == '11111111111' ||
                $cpf == '22222222222' ||
                $cpf == '33333333333' ||
                $cpf == '44444444444' ||
                $cpf == '55555555555' ||
                $cpf == '66666666666' ||
                $cpf == '77777777777' ||
                $cpf == '88888888888' ||
                $cpf == '99999999999') {
            return false;
            // Calcula os digitos verificadores para verificar se o
            // CPF é válido
        } else {

            for ($t = 9; $t < 11; $t++) {

                for ($d = 0, $c = 0; $c < $t; $c++) {
                    $d += $cpf{$c} * (($t + 1) - $c);
                }
                $d = ((10 * $d) % 11) % 10;
                if ($cpf{$c} != $d) {
                    return false;
                }
            }
            return true;
        }
    }

    public static function date($date) {
        if (preg_match("/^\d{1,2}\/\d{1,2}\/\d{4}$/", $date)) {
            //echo "ok";
            return true;
        } else {
            echo "not";
            return false;
        }
    }

    public static function mail($mail) {
        if (preg_match("/^([\w\-]+\.)*[\w\- ]+@([\w\- ]+\.)+([\w\-]{2,3})$/", $mail)) {
            //echo "ok";
            return true;
        } else {
            echo "not";
            return false;
        }
    }

    public static function password($pass) {
        if (preg_match("/(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/", $pass)) {
            //echo "ok";
            return true;
        } else {
            echo "not";
            return false;
        }
    }

    public static function username($user) {
        if (preg_match("/^[a-zA-Z0-9_.-]{3,16}$/", $user)) {
            //echo "ok";
            return true;
        } else {
            echo "not";
            return false;
        }
    }

    public static function phone($phone) {
        if (preg_match("/^(\+[0-9][0-9]) (\([0-9]{2}\))\s([9]{1})?([0-9]{4})-([0-9]{4})$/", $phone)) {
            return true;
        } else {
            return false;
        }
    }

    public static function cep($cep) {
        if (preg_match("/^[0-9]{5}-[0-9]{3}$/", $cep)) {
            return true;
        } else {
            return false;
        }
    }

    public static function name($name) {
        if (preg_match("/^(([a-zA-Z ]|[çáéíóúãẽĩõũàèìòùâêîôû]){1,60})$/", $name)) {
            return true;
        } else {
            return false;
        }
    }
    
    public static function text($text){
        if (preg_match("/^[^<>]{0,255}$/", $text)){
            return true;
        }else {
            return false;
        }
    }

}
