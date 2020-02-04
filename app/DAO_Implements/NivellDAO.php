<?php

class NivellDAO implements DAO_Nivell {
    use FormatSQL;
    private $connection;

    public function __construct() {
        $this->connection = DBConnection::getInstance('db_goatrails')->getConnection();
    }

    public function insert(Nivell $nivell) {
        $name = $nivell->getNom();

        $insert = $this->connection->prepare("INSERT INTO nivell
        (`nom`)values (:name)");
        $insert->bindParam(':name', $name);

        $insert->execute();

    }

    public function getNivellById($id) {
        $nivell = null;
        $select = $this->connection->prepare("SELECT * FROM nivell WHERE id = :id");
        $select->bindParam(':id', $id);

        $select->execute();

        if ($row = $select->fetch(PDO::FETCH_NUM)) {
            $nivell = new Nivell($row[0], $row[1]);
        }

        return $nivell;

    }

    public function deleteNivellById($id) {
        $select = $this->connection->prepare("DELETE FROM nivell WHERE id = :id");
        $select->bindParam(':id', $id);

        $select->execute();
    }

    public function getAllNivells() {
        $nivells = [];
        $select = "SELECT * FROM nivell";

        $stmt = $this->connection->prepare($select);
        $stmt->execute();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $nivells[] = new Nivell($row[1], $row[0]);
        }

        return $nivells;
    }

    public function updateNivell($id, $colName, $newValue) {
        $update = $this->connection->prepare("UPDATE Nivell SET :colName = :newValue WHERE id = :id");
        $update->bindParam(':colName', $colName);
        $update->bindParam(':newValue', $newValue);
        $update->bindParam(':id', $id);

        $update->execute();
    }
}