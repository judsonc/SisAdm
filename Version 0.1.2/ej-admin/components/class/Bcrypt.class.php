<?php

class Bcrypt {

    /*
     * Prefixo padrao de Salt
     * var string
     */
    protected static $_saltPrefix = '2a';

    /*
     * Custo padrao de Hash (4-31)
     * var integer
     */
    protected static $_defaultCost = 8;

    /*
     * Comprimento limite de Salt
     * var integer
     */
    protected static $_saltLength = 22;

    /*
     * Function hash()
     *      Sequencia de hash
     * param string, integer
     * return string
     */
    protected static function hash($string, $cost = null) {
        if (empty($cost)) {
            $cost = self::$_defaultCost;
        }

        // Salt
        $salt = self::generateRandomSalt();

        // Hash string
        $hashString = self::__generateHashString((int) $cost, $salt);

        return crypt($string, $hashString);
    }

    /*
     * Function generateRandomSalt()
     *      Gera um randomico base 64 atribuindo a variavel salt
     * param void
     * return string
     */
    protected static function generateRandomSalt() {
        // Salt seed
        $seed = uniqid(mt_rand(), true);

        // Generate salt
        $salt = base64_encode($seed);
        $salt = str_replace('+', '.', $salt);

        return substr($salt, 0, self::$_saltLength);
    }

    /*
     * Function __generateHashString()
     *      Cria um Hash do tipo String pra a funcao crypt()
     * param integer, string
     * return string
     */
    private static function __generateHashString($cost, $salt) {
        return sprintf('$%s$%02d$%s$', self::$_saltPrefix, $cost, $salt);
    }

}
