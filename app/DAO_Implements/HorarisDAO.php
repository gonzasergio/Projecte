<?php

class HorarisDAO implements DAO_Horari {
    use FormatSQL;
    private $connection;

    public function __construct() {
        $this->connection = DBConnection::getInstance('db_goatrails')->getConnection();
    }

    public function insert(Horari $horari) {
        $hora = $horari->getHora();
        $minut = $horari->getMinut();

        $insert = $this->
        connection->prepare("INSERT INTO horari
        (`hora`,`minut`)
        values (:hora, :minut)");

        $insert->bindParam(':hora', $hora);
        $insert->bindParam(':minut', $minut);

        $insert->execute();

    }

    public function getHorariById($id) {
        $horari = null;

        $select = $this->connection->prepare("SELECT * FROM horari WHERE id = :id");
        $select->bindParam(':id', $id);

        $select->execute();


        if ($row = $select->fetch(PDO::FETCH_NUM)) {
            $horari = new Horari($row[1], $row[2], $row[0]);
        }

        return $horari;

    }

    public function deleteHorariById($id) {
        $select = $this->connection->prepare("DELETE FROM horari WHERE id = :id");
        $select->bindParam(':id', $id);

        $select->execute();
    }

    public function getAllHoraris() {
        $horaris = [];
        $select = "SELECT * FROM horari";

        $stmt = $this->connection->prepare($select);
        $stmt->execute();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $horaris[] = new Horari($row[1], $row[2], $row[0]);
        }

        return $horaris;
    }

    public function updateHorari($id, $colName, $newValue) {
        $update = $this->connection->prepare("UPDATE horari SET :colName = :newValue WHERE id = :id");
        $update->bindParam(':colName', $colName);
        $update->bindParam(':newValue', $newValue);
        $update->bindParam(':id', $id);

        $update->execute();
    }

}