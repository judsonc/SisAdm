<?php

/**
 * @brief Classe ValidationData
 *      é responsável por validar os dados de acordo com tipo de verificação requisitado.
 *
 * @copyright \htmlonly<a href="https://github.com/judsonc">Judson Costa</a> e <a href="https://github.com/LeonardoJunio">Leonardo Junio</a>\endhtmlonly
 */
class ValidationData {

    /**
     * @brief Function img
     *      verifica se extensao passada é uma das extensoes validas.
     *      Padrão permitido: jpg, png, gif, jpeg, svg.
     * @param extensão
     * @return boolean
     */
    public static function img($ext) {
        $image = array('jpg', 'png', 'gif', 'jpeg', 'svg', 'JPG', 'PNG', 'GIF', 'JPEG', 'SVG');
        return in_array($ext, $image);
    }

    /**
     * @brief Function cpf
     *      recebe o CPF e verifica se ele é valido.
     *      Padrão permitido: 12345432109.
     * @param cpf
     * @return boolean
     */
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

    /**
     * @brief Function date
     *      avalia se a data é valida.
     *      Padrão permitido: 9/9/9999 ou 11/11/9999.
     * @param date
     * @return boolean
     */
    public static function date($date) {
        if (preg_match("/^\d{1,2}\/\d{1,2}\/\d{4}$/", $date)) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * @brief Function mail
     *      avalia se o email é valido.
     *      Padrão permitido: hhh_hh@hh.hhh.
     * @param mail
     * @return boolean
     */
    public static function mail($mail) {
        if (preg_match("/^([\w\-]+\.)*[\w\- ]+@([\w\- ]+\.)+([\w\-]{2,3})$/", $mail)) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * @brief Function password
     *      avalia se a senha é de nivel forte.
     * @param password
     * @return boolean
     */
    public static function password($pass) {
        if (preg_match("/(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/", $pass)) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * @brief Function username
     *      avalia se o nome do usuario é valido.
     *      Para ser valido precisa ter no de 3 a 16 caracteres, sendo letras e numeros.
     * @param string
     * @return boolean
     */
    public static function username($user) {
        if (preg_match("/^[a-zA-Z0-9_.-]{3,16}$/", $user)) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * @brief Function phone
     *      avalia se o telefone é valido.
     *      Padrão permitido: +99 (99) (9)9999-9999;
     * @param string
     * @return boolean
     */
    public static function phone($phone) {
        if (preg_match("/^(\+[0-9][0-9]) (\([0-9]{2}\))\s([9]{1})?([0-9]{4})-([0-9]{4})$/", $phone)) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * @brief Function cep
     *      avalia se o CEP é valido.
     *      Padrão permitido: 99999-999.
     * @param string
     * @return boolean
     */
    public static function cep($cep) {
        if (preg_match("/^[0-9]{5}-[0-9]{3}$/", $cep)) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * @brief Function name
     *      analisa se o nome é valido.
     *      Só pode conter letra e caracteres acentuados, tendo de 1 a 60 caracteres.
     * @param string
     * @return boolean
     */
    public static function name($name) {
        if (preg_match("/^(([a-zA-Z ]|[çáéíóúãẽĩõũàèìòùâêîôû]){1,60})$/", $name)) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * @brief Function text
     *      avalia se o texto é valido.
     *      Ou seja, não conter tags do HTML.
     * @param string
     * @return boolean
     */
    public static function text($text) {
        if (preg_match("/^[^<>]{0,255}$/", $text)) {
            return true;
        } else {
            return false;
        }
    }
}