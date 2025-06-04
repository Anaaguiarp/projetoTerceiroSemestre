<?php

class ConnectionFactory {
    private static $connection;

    public static function getConnection() {
        if (!isset(self::$connection)) {
            $host = 'localhost';
            $dbName = 'projeto_cuidados_paliativos';
            $user = 'root';
            $pass = '';
            $port = '3307';

            try {
                self::$connection = new PDO("mysql:host=$host;dbname=$dbName;port=$port", $user, $pass);
                self::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $ex) {
                echo("Erro ao conectar no banco de dados. <p>{$ex->getMessage()}</p>");
            }
        }
        return self::$connection;
    }
}

?>
