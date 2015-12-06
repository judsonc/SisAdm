<?php

/**
 * @brief Classr Bcrypt
 *      é responsável por criptografar todos os dados passados.
 *
 * @copyright \htmlonly<a href="https://github.com/judsonc">Judson Costa</a> e <a href="https://github.com/LeonardoJunio">Leonardo Junio</a>\endhtmlonly
 */
abstract class Bcrypt {
    protected static $_saltPrefix = '2a';   /**< Prefixo padrao de Salt (padrao = '2a') */
    protected static $_defaultCost = 8;   /**< Custo padrao de Hash (4-31) (padrao = 8) */
    protected static $_saltLength = 22;   /**< Comprimento limite de Salt (padrao = 22) */

    /**
     * @brief Function hash
     *      sequencia de hash.
     * @param string
     * @param integer
     * @return string
     */
    protected static function hash($string, $cost = null) {
        if (empty($cost)) {
            $cost = self::$_defaultCost;
        }
        $salt = self::generateRandomSalt();
        $hashString = self::__generateHashString((int) $cost, $salt);

        return crypt($string, $hashString);
    }

    /**
     * @brief Function generateRandomSalt
     *      gera um randomico base 64 atribuindo a variavel salt.
     * @param void
     * @return string
     */
    protected static function generateRandomSalt() {
        // Salt seed
        $seed = uniqid(mt_rand(), true);

        // Generate salt
        $salt = base64_encode($seed);
        $salt = str_replace('+', '.', $salt);

        return substr($salt, 0, self::$_saltLength);
    }

    /**
     * @brief Function __generateHashString
     *      cria um Hash do tipo String pra a funcao crypt.
     * @param integer
     * @param string
     * @return string
     */
    private static function __generateHashString($cost, $salt) {
        return sprintf('$%s$%02d$%s$', self::$_saltPrefix, $cost, $salt);
    }
}
