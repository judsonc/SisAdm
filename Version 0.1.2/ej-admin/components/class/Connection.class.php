<?php

abstract class Connection {
    private static $hostname = "localhost";
    private static $username = "root";
    private static $password = "";
    private static $dbname = "db-teste";
    protected static $conn;

    /*
     * Function get()
     *      Seleciona todos os campos do Banco de dados e retorna os valores das colunas ja descriptografado
     * param void
     * return object
     */
    static private function connect() {
        $conn = new mysqli(self::$hostname, self::$username, self::$password, self::$dbname);

        // Checar conexao
        if ($conn->connect_error) {
            die("<hr> Connection failed: " . $conn->connect_error);
        }
        self::$conn = $conn;
    }

    /*
     * Function get()
     *      Seleciona todos os campos do Banco de dados e retorna os valores das colunas ja descriptografado
     * param void
     * return object
     */
    static protected function execute($query) {
        if (empty(self::$conn) || !isset(self::$conn)) {
            Connection::connect();
        }
        $result = self::$conn->query($query);
        if (!$result) {
            echo "<hr> Error creating database: " . self::$conn->error;
        } else {
            return $result;
        }
    }

    /*
     * Function get()
     *      Seleciona todos os campos do Banco de dados e retorna os valores das colunas ja descriptografado
     * param void
     * return object
     */
    static public function close() {
        mysqli_close(self::$conn);
    }
}
