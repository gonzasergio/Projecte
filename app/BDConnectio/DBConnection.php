<?php

class DBConnection {

    private static $instance = null;
    private $conn = null;

    private function __construct() {
        try {
            $DBConf = null;
            require_once '../../app/BDConnectio/DBConfig.php';

            $servername = $DBConf["servername"];
            $username = $DBConf["username"];
            $password = $DBConf["password"];
            $dbname = $DBConf["dbname"];

            $this->conn = new PDO("mysql:host=$servername;dbname=$dbname", "$username", "$password");
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