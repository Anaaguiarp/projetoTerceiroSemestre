<?php

class ConnectionFactory{ // padrão singleton
    static $connection;

    public static function getConnection(){
        if(!isset($connection)){
            $host = "localhost";
            $dbName = "teste";
            $user = "root";
            $pass = "";
            #$port = 3307; # para PC da Universidade
            $port = 3306; # para PC pessoal
                
            try{
                $connection = new PDO("mysql:host=$host;dbname=$dbName;port=$port", $user,$pass);
                //echo("Contectado com sucesso!");
                return $connection;
            }catch(PDOException $ex){
                echo("ERRO ao conectar no banco de dados! <p>$ex</p>");
            }
        }
        return $connection;
    }
}

?>