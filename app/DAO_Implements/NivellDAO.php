<?php

class NivellDAO implements DAO_Nivell {
    use FormatSQL;
    private $connection;

    public function __construct() {
        $this->connection = DBConnection::getInstance('db_goatrails')->getConnection();
    }

    public function insert(Nivell $nivell) {
        $nom = $this->packUp($nivell->getNom());

        $insert = "INSERT INTO nivell
        (`nom`)
        values ($nom)";

        $this->connection->prepare($insert)->execute();

    }

    public function getNivellById($id) {
        $nivell = null;
        $select = "SELECT * FROM nivell WHERE id = $id";

        $stmt = $this->connection->prepare($select);
        $stmt->execute();

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $nivell = new Nivell($row[0], $row[1]);
        }

        return $nivell;

    }

    public function deleteNivellById($id) {
        $select = "DELETE FROM nivell WHERE id = $id";

        $stmt = $this->connection->prepare($select);
        $stmt->execute();
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
        $newValue = $this->packUp($newValue);
        $update = "UPDATE nivell SET $colName = $newValue WHERE id = $id";

        $this->connection->prepare($update)->execute();
    }
}