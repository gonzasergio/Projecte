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
        $select = "select excursio.id, titol, distancia, nom, duracio, maxim_persones, descripcio
        from excursio, nivell
        where id_dificultat = nivell.id and excursio.id = $id";

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
            $cond = $cond . " inner join excursio_modalitat m$k on e.id = m$k.id_excursio and m$k.id_modalitat = (select id from tipus_modalitat where nom = '$m')";

        $select = "SELECT e.id FROM excursio e " . $cond;

        $stmt = $this->connection->prepare($select);
        $stmt->execute();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $excursions[] = $row[0];
        }

        return $excursions;
    }

    public function getRouteAvg($id){
        $ret = [];
        $select = $this->
        connection->prepare("select avg(puntuacio) 'avg',
        count(IF(puntuacio=5,1,NULL))*100/count(*) '5',
        count(IF(puntuacio=4,1,NULL))*100/count(*) '4',
        count(IF(puntuacio=3,1,NULL))*100/count(*) '3',
        count(IF(puntuacio=2,1,NULL))*100/count(*) '2',
        count(IF(puntuacio=1,1,NULL))*100/count(*) '1',
        count(IF(puntuacio=0,1,NULL))*100/count(*) '0',
        count(IF(puntuacio=5,1,NULL)) '5count',
        count(IF(puntuacio=4,1,NULL)) '4count',
        count(IF(puntuacio=3,1,NULL)) '3count',
        count(IF(puntuacio=2,1,NULL)) '2count',
        count(IF(puntuacio=1,1,NULL)) '1count',
        count(IF(puntuacio=0,1,NULL)) '0count'
        from puntuar_perfil_excursio 
        where id_excursio = :id group by id_excursio");

        $select->bindParam(':id', $id);
        $select->execute();

        if ($row = $select->fetch(PDO::FETCH_NUM)) {
            return $row;
        }

        for ($i = 0 ; $i < 13 ; $i++)
            $ret[$i] = 0;

        return $ret;
    }

    public function getAllExcursionsByText($text) {
        $excursions = [];
        $text = '%' . $text . '%';
        $select = $this->connection->
        prepare("SELECT id FROM excursio where descripcio like :desc or titol like :tit ; ");

        $select->bindParam(':desc', $text);
        $select->bindParam(':tit', $text);

        $select->execute();

        while ($row = $select->fetch(PDO::FETCH_NUM))
            $excursions[] = $row[0];

        return $excursions;
    }

    public function getRouteModalitys($id){
        $mod = '';
        $flag = true;
        $select = $this->connection->prepare("select nom from excursio_modalitat, tipus_modalitat where id_excursio = :id and tipus_modalitat.id = id_modalitat");
        $select->bindParam(':id', $id);

        $select->execute();
        while ($row = $select->fetch(PDO::FETCH_NUM)) {
            $com = ($flag == true) ? '' : ',';
            $mod = $mod . $com . $row[0];
            $flag = false;
        }

        return $mod;
    }
}