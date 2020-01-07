<?php

class ModalitatDAO implements DAO_Modalitat {
    use FormatSQL;
    private $connection;

    public function __construct() {
        $this->connection = DBConnection::getInstance('db_goatrails')->getConnection();
    }

    public function insert(Modalitat $modalitat) {
        $nom = $this->packUp($modalitat->getNom());

        $insert = "INSERT INTO tipus_modalitat
        (`nom`)
        values ($nom)";

        $this->connection->prepare($insert)->execute();

    }

    public function getModalitatById($id) {
        $modalitat = null;
        $select = "SELECT * FROM tipus_modalitat WHERE id = $id";

        $stmt = $this->connection->prepare($select);
        $stmt->execute();

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $modalitat = new Modalitat($row[0], $row[1]);
        }

        return $modalitat;

    }

    public function deleteModalitatById($id) {
        $select = "DELETE FROM tipus_modalitat WHERE id = $id";

        $stmt = $this->connection->prepare($select);
        $stmt->execute();
    }

    public function getAllModalitats() {
        $modalitats = [];
        $select = "SELECT * FROM tipus_modalitat";

        $stmt = $this->connection->prepare($select);
        $stmt->execute();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $modalitats[] = new Modalitat($row[1], $row[0]);
        }

        return $modalitats;
    }

    public function updateModalitat($id, $colName, $newValue) {
        $newValue = $this->packUp($newValue);
        $update = "UPDATE tipus_modalitat SET $colName = $newValue WHERE id = $id";

        $this->connection->prepare($update)->execute();
    }
}