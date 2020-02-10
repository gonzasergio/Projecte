<?php

class ModalitatDAO implements DAO_Modalitat {
    use FormatSQL;
    private $connection;

    public function __construct() {
        $this->connection = DBConnection::getInstance('db_goatrails')->getConnection();
    }

    public function insert(Modalitat $modalitat) {
        $name = $modalitat->getNom();

        $insert = $this->connection->prepare("INSERT INTO tipus_modalitat
        (`nom`)values (:name)");
        $insert->bindParam(':name', $name);

        $insert->execute();

    }

    public function getModalitatById($id) {
        $modalitat = null;
        $select = $this->connection->prepare("SELECT * FROM tipus_modalitat WHERE id = :id");
        $select->bindParam(':id', $id);

        $select->execute();

        if ($row = $select->fetch(PDO::FETCH_NUM)) {
            $modalitat = new Modalitat($row[1], $row[0]);
        }

        return $modalitat;

    }

    public function deleteModalitatById($id) {
        $select = $this->connection->prepare("DELETE FROM tipus_modalitat WHERE id = :id");
        $select->bindParam(':id', $id);

        $select->execute();
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
        $update = $this->connection->prepare("UPDATE Modalitat SET :colName = :newValue WHERE id = :id");
        $update->bindParam(':colName', $colName);
        $update->bindParam(':newValue', $newValue);
        $update->bindParam(':id', $id);

        $update->execute();
    }
}