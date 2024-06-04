<?php

class Database {
    //pegar uma conexão
    public static function getConnection(){
        $envPath = realpath(dirname(__FILE__). "/../env.ini");
        $env = parse_ini_file($envPath);
        $conn = new mysqli($env['host'], $env['username'], $env['password'], $env['database']);
        
        //verificar se deu bom a conexão
        if($conn->connect_error){
            die("Erro de conexão" . $conn->connect_error);
        }
        return $conn;
        
    }

    public static function getResultFromQuery($sql){
        $conn = self::getConnection();
        $result = $conn->query($sql);
        $conn->close();

        return $result;
    }
}