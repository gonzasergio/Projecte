<?php

class CursosDAO implements DAO_Curs {
    use FormatSQL;
    private $connection;

    public function __construct() {
        $this->connection = DBConnection::getInstance('db_goatrails')->getConnection();
    }

    public function insert(Curs $curs) {
        $duracio = $this->packUp($curs->getDuracio());
        $preu = $this->packUp($curs->getPreu());
        $maxim_persones = $this->packUp($curs->getMaxim_persones());
        $descripcio = $this->packUp($curs->getDescripcio());
        $id_promocio = $this->packUp($curs->getId_promocio());
        $id_dificultat = $this->packUp($curs->getId_dificultat());

        $insert = "INSERT INTO curs (`duracio`,`preu`,`maxim_persones`,`descripcio`,`id_promocio`,`id_dificultat`)
        values ($duracio, $preu, $maxim_persones, $descripcio, $id_promocio, $id_dificultat)";

        $this->connection->prepare($insert)->execute();

    }

    public function getCursById($id) {
        $curs = null;
        $select = "SELECT * FROM curs WHERE id = $id";

        $stmt = $this->connection->prepare($select);
        $stmt->execute();

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $curs = new Curs($row[1], $row[2], $row[3], $row[4], $row[5], $row[0]);
        }

        return $excursio;

    }
    
    public function deleteCursById($id) {
        $select = "DELETE FROM curs WHERE id = $id";
        
        $stmt = $this->connection->prepare($select);
        $stmt->execute();
    }

    public function getAllCursos() {
        $cursos = [];
        $select = "SELECT * FROM curs";

        $stmt = $this->connection->prepare($select);
        $stmt->execute();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $cursos[] = new Curs($row[1], $row[2], $row[3], $row[4], $row[5], $row[0]);
        }

        return $cursos;
    }

    public function updateCurs($id, $colName, $newValue) {
        $newValue = $this->packUp($newValue);
        $update = "UPDATE curs SET $colName = $newValue WHERE id = $id";

        $this->connection->prepare($update)->execute();
    }
}
