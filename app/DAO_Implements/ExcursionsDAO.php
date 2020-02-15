<?php

abstract class ExcursionsDAO extends DAO implements DAO_Excursio {

    public function insert(Excursio $excursio) {
        $attr = [':title', ':distance', ':id_dif', ':duration', ':max_person', ':description'];
        $key = ['titol', 'distancia', 'id_dificultat', 'duracio', 'maxim_persones', 'descripcio'];
        $val = $excursio->toArray();

        $insert = $this->connection->prepare
        ("INSERT INTO excursio 
        (`titol`,`distancia`,`id_dificultat`,`duracio`,`maxim_persones`,`descripcio`)
        values (:title, :distance, :id_dif, :duration, :max_person, :description)");

        for ($i = 0 ; $i<sizeof($attr) ; $i++)
            $insert->bindParam($attr[$i], $val[$key[$i]]);

        $insert->execute();
        return $this->connection->lastInsertId();

    }

    public function getExcursioById($id) {
        $excursio = null;
        $select = "SELECT * FROM excursio WHERE id = $id";

        $stmt = $this->connection->prepare($select);
        $stmt->execute();

        if ($row = $stmt->fetch(PDO::FETCH_NUM))
            return $row;

    }
    
    public function deleteExcursioById($id) {
        $select = "DELETE FROM excursio WHERE id = $id";
        
        $stmt = $this->connection->prepare($select);
        $stmt->execute();
    }

    public function updateExcursio($id, $colName, $newValue) {
        $newValue = $this->packUp($newValue);
        $update = "UPDATE excursio SET $colName = $newValue WHERE id = $id";

        $this->connection->prepare($update)->execute();
    }

    public function getAllExcursionsByDistance($distance) {
        return $this->filter('distancia', $distance);
    }

    public function getAllExcursionsByDifficulty($idDiff) {
        return $this->filter('id_dificultat', $idDiff);
    }

    public function getAllExcursionsByDuration($duration) {
        return $this->filter('duracio', $duration);
    }


    protected function filter($colName, $id){
        $excursions = [];
        $select = "SELECT id FROM excursio where $colName = $id";

        $stmt = $this->connection->prepare($select);
        $stmt->execute();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $excursions[] = $row[0];
        }

        return $excursions;
    }

    public function getAllExcursionsByModality($idMod){
        $excursions = [];
        $cond = '';

        foreach ($idMod as $k => $m)
            $cond = $cond . " inner join excursio_modalitat m$k on e.id = m$k.id_excursio and m$k.id_modalitat = $m";

        $select = "SELECT e.id FROM excursio e " . $cond;

        $stmt = $this->connection->prepare($select);
        $stmt->execute();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $excursions[] = $row[0];
        }

        return $excursions;
    }
}