<?php

class HorarisDAO implements DAO_Horari {
    use FormatSQL;
    private $connection;

    public function __construct() {
        $this->connection = DBConnection::getInstance('db_goatrails')->getConnection();
    }

    public function insert(Horaris $horari) {
        $hora = $this->packUp($horari->getHora());
        $minut = $this->packUp($horari->getMinut());

        $insert = "INSERT INTO horari
        (`hora`,`minut`)
        values ($hora, $minut)";

        $this->connection->prepare($insert)->execute();

    }

    public function getHorariById($id) {
        $horari = null;
        $select = "SELECT * FROM horari WHERE id = $id";

        $stmt = $this->connection->prepare($select);
        $stmt->execute();

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $horari = new Horari($row[1], $row[2], $row[0]);
        }

        return $horari;

    }

    public function deleteHorariById($id) {
        $select = "DELETE FROM horari WHERE id = $id";

        $stmt = $this->connection->prepare($select);
        $stmt->execute();
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

    public function updateHoraris($id, $colName, $newValue) {
        $newValue = $this->packUp($newValue);
        $update = "UPDATE horari SET $colName = $newValue WHERE id = $id";

        $this->connection->prepare($update)->execute();
    }
}