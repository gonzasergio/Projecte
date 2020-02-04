<?php

class CursosDAO implements DAO_Curs {
    use FormatSQL;
    private $connection;
    
    public function __construct() {
        $this->connection = DBConnection::getInstance('db_goatrails')->getConnection();
    }
    
    public function insert(Curs $curs) {
        $insert = $this->connection->prepare
        ("INSERT INTO curs (`titol`,`duracio`,`id_dificultat`,`preu`,`maxim_persones`,`descripcio`,`id_ciutat`,`id_propietari`)
        values (:titol, :duracio, :id_dificultat, :preu, :maxim_persones, :descripcio, :id_ciutat, :id_propietari)");

        $insert->bindParam(':titol', $titol = $curs->getTitol());
        $insert->bindParam(':duracio', $duracio = $curs->getDuracio());
        $insert->bindParam(':id_dificultat', $id_dificultat = $curs->getId_dificultat());
        $insert->bindParam(':preu',  $preu = $curs->getPreu());
        $insert->bindParam(':maxim_persones', $maxim_persones = $curs->getMaxim_persones());
        $insert->bindParam(':descripcio', $descripcio = $curs->getDescripcio());
        $insert->bindParam(':id_ciutat', $id_ciutat = $curs->getIdCiutat());
        $insert->bindParam(':id_propietari', $id_propietari = $curs->getIdPropietari());

        $insert->execute();
        
    }
    
    public function getCursById($id) {
        $curs = null;

        $select = $this->connection->prepare("SELECT * FROM curs WHERE id = :id");
        $select->bindParam(':id', $id);

        $select->execute();

        if ($row = $select->fetch(PDO::FETCH_NUM)) {
            $curs = new Curs($row[1], $row[2], $row[3], $row[4], $row[5], $row[6], $row[7], $row[8], $row[0]);
        }
        
        return $curs;
        
    }
    
    public function deleteCursById($id) {
        $select = $this->connection->prepare("DELETE FROM curs WHERE id = :id");
        $select->bindParam(':id', $id);

        $select->execute();
    }
    
    public function getAllCursos() {
        $cursos = [];
        $select = "SELECT * FROM curs";
        
        $stmt = $this->connection->prepare($select);
        $stmt->execute();
        
        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $cursos[] = new Curs($row[1], $row[2], $row[3], $row[4], $row[5], $row[6], $row[7], $row[8], $row[0]);
        }
        
        return $cursos;
    }
    
    public function getAllCursosByIdPropietari($id){
        $cursos = [];

        $select = $this->connection->prepare("SELECT * FROM curs where id_propietari = :id");
        $select->bindParam(':id', $id);

        $select->execute();
        
        while ($row = $select->fetch(PDO::FETCH_NUM)) {
            $cursos[] = new Curs($row[1], $row[2], $row[3], $row[4], $row[5], $row[6], $row[7], $row[8], $row[0]);
        }
        
        return $cursos;
    }
    
    public function updateCurs($id, $colName, $newValue) {
        $update = $this->connection->prepare("UPDATE curs SET :colName = :newValue WHERE id = :id");
        $update->bindParam(':colName', $colName);
        $update->bindParam(':newValue', $newValue);
        $update->bindParam(':id', $id);

        $update->execute();
    }
}
