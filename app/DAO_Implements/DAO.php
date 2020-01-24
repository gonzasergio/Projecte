<?php


class DAO {
    use FormatSQL;
    protected $connection;

    public function __construct() {
        $this->connection = DBConnection::getInstance('db_goatrails')->getConnection();
    }

    public function executeQuery($query){
        return $this->connection->prepare($query);
    }

}