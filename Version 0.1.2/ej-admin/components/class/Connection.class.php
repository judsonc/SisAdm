<?php

abstract class Connection {
    private static $hostname = "localhost";
    private static $username = "root";
    private static $password = "";
    private static $dbname = "db-teste";
    protected static $conn;

    /*
     * Function connect()
     *      Realiza a conexao pelas strings: hostname, username, password e dbname, usando banco de dados 'mysqli', além de checar a conexao.
     * param void
     * return object
     */
    private static function connect() {
        $conn = new mysqli(self::$hostname, self::$username, self::$password, self::$dbname);

        // Checar conexao
        if ($conn->connect_error) {
            die("<hr> Connection failed: " . $conn->connect_error);
        }
        self::$conn = $conn;
    }

    /*
     * Function execute()
     *      Executa a criação de uma base de dados realizando a conexao
     * param string
     * return string
     */
    protected static function execute($query) {
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
     * Function close()
     *      Fecha a conexão com o banco de dados
     * param void
     * return void
     */
    public static function close() {
        mysqli_close(self::$conn);
    }
}
