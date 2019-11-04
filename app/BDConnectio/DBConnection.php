<?php

class DBConnection {

    private static $instance = null;
    private $conn = null;

    private function __construct() {
        try {
            $this->conn = new PDO("mysql:host=localhost;dbname=goatrails", "admin", "12345678");
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    public static function getInstance(){
        if(self::$instance == null)
            self::$instance = new DBConnection();

        return self::$instance;
    }

    public function getConnection(){
        return $this->conn;
    }

}