<?php

class ExcursionsDAO implements DAO_Excursio {
    use FormatSQL;
    private $connection;

    public function __construct() {
        $this->connection = DBConnection::getInstance('db_goatrails')->getConnection();
    }

    public function insert(Excursio $excursio) {
        $distancia = $this->packUp($excursio->getDistancia());
        $id_dificultat = $this->packUp($excursio->getId_dificultat());
        $duracio = $this->packUp($excursio->getDuracio());
        $preu = $this->packUp($excursio->getPreu());
        $maxim_persones = $this->packUp($excursio->getMaxim_persones());
        $descripcio = $this->packUp($excursio->getDescripcio());

        $insert = "INSERT INTO excursio (`distancia`,`id_dificultat`,`duracio`,`preu`,'maxim_persones',`descripcio`)
        values ($distancia, $id_dificultat, $duracio, $preu, $maxim_persones, $descripcio)";

        $this->connection->prepare($insert)->execute();

    }

    public function getExcursioById($id) {
        $excursio = null;
        $select = "SELECT * FROM excursio WHERE id = $id";

        $stmt = $this->connection->prepare($select);
        $stmt->execute();

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $excursio = new Excursio($row[1], $row[2], $row[3], $row[4], $row[5], $row[0]);
        }

        return $excursio;

    }
    
    public function deleteExcursioById($id) {
        $select = "DELETE FROM excursio WHERE id = $id";
        
        $stmt = $this->connection->prepare($select);
        $stmt->execute();
    }

    public function getAllExcursions() {
        $excursions = [];
        $select = "SELECT * FROM excursio";

        $stmt = $this->connection->prepare($select);
        $stmt->execute();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $excursions[] = new Excursio($row[1], $row[2], $row[3], $row[4], $row[5], $row[0]);
        }

        return $excursions;
    }

    public function updateExcursio($id, $colName, $newValue) {
        $newValue = $this->packUp($newValue);
        $update = "UPDATE excursio SET $colName = $newValue WHERE id = $id";

        $this->connection->prepare($update)->execute();
    }
}