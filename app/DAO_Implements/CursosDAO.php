<?php

class CursosDAO implements DAO_Curs {
    use FormatSQL;
    private $connection;

    public function __construct() {
        $this->connection = DBConnection::getInstance('db_goatrails')->getConnection();
    }

    public function insert(Curs $curs) {
        $titol = $this->packUp($curs->getTitol());
        $duracio = $this->packUp($curs->getDuracio());
        $id_dificultat = $this->packUp($curs->getId_dificultat());
        $preu = $this->packUp($curs->getPreu());
        $maxim_persones = $this->packUp($curs->getMaxim_persones());
        $descripcio = $this->packUp($curs->getDescripcio());
        $id_ciutat = $this->packUp($curs->getIdCiutat());
        $id_propietari = $this->packUp($curs->getIdPropietari());

        $insert = "INSERT INTO curs (`titol`,`duracio`,`id_dificultat`,`preu`,`maxim_persones`,`descripcio`,`id_ciutat`,`id_propietari`)
        values ($titol, $duracio, $id_dificultat, $preu, $maxim_persones, $descripcio, $id_ciutat, $id_propietari)";

        $this->connection->prepare($insert)->execute();

    }

    public function getCursById($id) {
        $curs = null;
        $select = "SELECT * FROM curs WHERE id = $id";

        $stmt = $this->connection->prepare($select);
        $stmt->execute();

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $curs = new Curs($row[1], $row[2], $row[3], $row[4], $row[5], $row[6], $row[7], $row[8], $row[9], $row[0]);
        }

        return $curs;

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
            $cursos[] = new Curs($row[1], $row[2], $row[3], $row[4], $row[5], $row[6], $row[7], $row[8], $row[9], $row[0]);
        }

        return $cursos;
    }

    public function getAllCursosByIdPropietari($id){
        $cursos = [];
        $select = "SELECT * FROM curs where id_propietari = $id";

        $stmt = $this->connection->prepare($select);
        $stmt->execute();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $cursos[] = new Curs($row[1], $row[2], $row[3], $row[4], $row[5], $row[6], $row[7], $row[8], $row[9], $row[0]);
        }

        return $cursos;
    }

    public function updateCurs($id, $colName, $newValue) {
        $newValue = $this->packUp($newValue);
        $update = "UPDATE curs SET $colName = $newValue WHERE id = $id";

        $this->connection->prepare($update)->execute();
    }
}
