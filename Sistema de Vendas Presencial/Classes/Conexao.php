<?php


class Conexao{
    public static $conn;
    public $file;

    public function __construct(){
        try {
            self::$conn = new PDO("mysql:host=localhost;
            dbname=vendaspresenciais", "root", "");

        }catch (PDOException $e){
            throw new PDOException($e);
        }
    }

}

