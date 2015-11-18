<?php
include ('Connection.class.php');

abstract class Dbcommand extends Connection {

    /*
     * Function select()
     *      Seleciona todo o Banco de dados de acordo com as colunas e valores passados,
     *      caso queira selecionar tudo, passa-se tudo como parametro,
     *      assim como demais complementos, retornando um array pronto pra ser separado
     * param string Nome da tabela, array Dados ('Coluna' => "Valores") || string 'ALL', string Complementos (Ex: ORDER BY, LIMIT) || default = ''
     * return array Result
     */
    public static function select($table, $where, $more = '') {
        if ('ALL' === $where || array('ALL') === $where) {
            $sql = "SELECT * FROM $table";
        } else {
            $sql = "SELECT * FROM $table WHERE";
            foreach ($where as $column => $value) {
                $sql .= " AND $column = '$value'";
            }
            $sql = preg_replace("/AND/", "", $sql, 1); // Retira o primeiro AND
        }
        $sql .= " " . $more;
        return Dbcommand::execute($sql);
    }

    /*
     * Function insert()
     *      Insere no Banco de dados
     * param string Nome da tabela, array Colunas, array Valores
     * return array Result
     */
    public static function insert($table, $column, $value) {
        if (count($value) === count($column)) {
            $sql = "INSERT INTO $table ($column[0]";
            for ($i = 1; $i < count($column); $i++) {
                $sql = $sql . ", $column[$i]";
            }
            $sql = $sql . ") VALUES ('$value[0]'";
            for ($i = 1; $i < count($column); $i++) {
                $sql = $sql . ", '$value[$i]'";
            }
            $sql = $sql . ")";
        }
        return Dbcommand::execute($sql);
    }

    /*
     * Function update()
     *      Atualiza os valores no Banco de dados, precisando dos novos valores e de um condicional para especifica quais linhas serão atualizadas
     * param string Nome da tabela, array Dados ('Coluna' => "Valores"), array Where ('Coluna' => "Valores")
     * return array Result
     */
    public static function update($table, $data, $where) { //where = ''
        $sql = "UPDATE $table SET";
        foreach ($data as $column => $value) {
            $sql .= " $column = '$value',";
        }
        $sql = substr_replace($sql, '', -1); // Retira a ultima virgula
        $sql .= " WHERE"; // Pode colocar uma condicao pra adicionar where se tiver passado, pois assim dá erro caso nao tenha where, porem previne erros
        foreach ($where as $column => $value) {
            $sql .= " AND $column = '$value'";
        }
        $sql = preg_replace("/AND/", "", $sql, 1); // Retira o primeiro AND
        return Dbcommand::execute($sql);
    }

    /*
     * Function delete()
     *      Deleta no banco de dados
     * param string Nome da tabela, array Where ('Coluna' => "Valores")
     * return array Result
     */
    public static function delete($table, $where) {
        $sql = "DELETE FROM $table WHERE";
        foreach ($where as $column => $value) {
            $sql .= " AND $column = '$value'";
        }
        $sql = preg_replace("/AND/", "", $sql, 1); // Retira o primeiro AND
        return Dbcommand::execute($sql);
    }

    /*
     * Function anti_injection()
     *      Limpa a string passada de injection, ou seja, barra todos os acentos
     * param string
     * return string
     */
    private static function anti_injection($sql) {
        $mysqli = self::$conn;
        $sql2 = $mysqli->real_escape_string($sql);
        return $sql2;
    }

    /*
     * Function post()
     *      Trata os dados passado pelo POST daquele campo retornando uma string anti SQL injection
     * param string
     * return string
     */
    public static function post($name) {
        $name = @$_POST[$name];
        $name = Dbcommand::anti_injection($name);
        return $name;
    }

    /*
     * Function get()
     *      Retorna os dados passado pelo GET daquele campo
     * param string
     * return string
     */
    public static function get($name) {
        $name = @$_GET[$name];
        return $name;
    }

    /*
     * Function rows()
     *      Quebra a string retornada do banco em um array
     * param string
     * return array
     */
    public static function rows($result) {
        $row = $result->fetch_assoc();
        return $row;
    }

    /*
     * Function arrays()
     *      Quebra a string retornada do banco em um array
     * param string
     * return array
     */
    public static function arrays($result) {
        $array = $result->fetch_array();
        return $array;
    }

    /*
     * Function count_rows()
     *      Retorna a quantidades de elementos no array
     * param string
     * return int
     */
    public static function count_rows($result) {
        $number = $result->num_rows;
        return $number;
    }

}

/*      =====     PARA TESTES     ======      */
$path = "/ej-admin"; // Diretorio da index
$server = "http://" . $_SERVER['HTTP_HOST'] . $path;
