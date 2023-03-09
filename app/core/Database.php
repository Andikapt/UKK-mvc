<?php

// Consep dari database ini menggunakan PHP PDO

class Database{ // class database di gunakan untuk PHP PDO
    //Variable untuk mengambil Defined Variable dari env file
    private $host = "DB_HOST"; // variable host
    private $user = "DB_USER"; // variable user
    private $pass = "DB_PASS"; // variable password
    private $db = "DB_NAME"; // Nama Database

    private $dbh;
    private $stmt;

    public function __construct()
    {
        $dsn = "mysql:host=$this->host;dbname=$this->db";
        $options = [
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ];

        try{
            $this->dbh = new PDO($dsn, $this->user, $this->pass, $options);
        } catch(PDOException $e){
            die($e->getMessage());
        }
    }

    //Binding The Data
    public function bind($param, $value, $type = null){
        if(is_null($type)){
            switch(true){
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;
                default:
                    $type = PDO::PARAM_STR;
                    break;
            }
        }
        $this->stmt->bindValue($param, $value, $type)
    }
}