<?php

class PromocionsDAO implements DAO_Promocio {
    use FormatSQL;
    private $connection;

    public function __construct() {
        $this->connection = DBConnection::getInstance('db_goatrails')->getConnection();
    }

    public function insert(Promocio $promocio) {
        $name = $promocio->getNom();
        $preu = $promocio->getPreu();

        $insert = $this->
        connection->prepare("INSERT INTO promocio (`nom`,`preu`)
        values (:name, :preu)");

        $insert->bindParam(':name', $name);
        $insert->bindParam(':preu', $preu);

        $insert->execute();

    }

    public function getPromocioById($id) {
        $promocio = null;

        $select = $this->connection->prepare("SELECT * FROM promocio WHERE id = :id");
        $select->bindParam(':id', $id);

        $select->execute();

        if ($row = $select->fetch(PDO::FETCH_NUM)) {
            $promocio = new Promocio($row[1], $row[2], $row[0]);
        }

        return $promocio;

    }

    public function deletePromocioById($id) {
        $select = $this->connection->prepare("DELETE FROM promocio WHERE id = :id");
        $select->bindParam(':id', $id);

        $select->execute();
    }

    public function getAllPromocio() {
        $promocions = [];
        $select = "SELECT * FROM promocio";

        $stmt = $this->connection->prepare($select);
        $stmt->execute();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $promocions[] = new Promocio($row[1], $row[2], $row[0]);
        }

        return $promocions;
    }

    public function updatePromocio($id, $colName, $newValue) {
        $update = $this->connection->prepare("UPDATE promocio SET :colName = :newValue WHERE id = :id");
        $update->bindParam(':colName', $colName);
        $update->bindParam(':newValue', $newValue);
        $update->bindParam(':id', $id);

        $update->execute();
    }

}