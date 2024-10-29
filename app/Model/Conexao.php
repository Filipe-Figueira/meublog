<?php 
abstract class Conexao {
    private static $conn;

    public static function getConn()
    {
        if (!isset(self::$conn)):
            self::$conn = new PDO("mysql:dbname=meublog; host=127.0.0.1; charset=utf8;", "root", "");
        endif;
        return self::$conn;
    }
}
?>