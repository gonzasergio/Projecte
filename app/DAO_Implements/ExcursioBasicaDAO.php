<?php


class ExcursioBasicaDAO extends ExcursionsDAO {

    public function insert(Excursio $excursio) {
        $id = parent::insert($excursio);
        $prop = $excursio->getPropietari();

        $insert = $this->connection->prepare
        ("INSERT INTO basica
        values (:id_exc, :id_prop)");

        $insert->bindParam(':id_exc', $id);
        $insert->bindParam(':id_prop', $prop);

        $insert->execute();

        return $id;
    }

    public function getAllExcursions() {
        $excursio = [];
        $select = "select id_excursio, userName from basica, perfil
        where id_perfil = perfil.id";

        $stmt = $this->connection->prepare($select);
        $stmt->execute();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $exBase = parent::getExcursioById($row[0]);

            $exc = new ExcursioBasica($exBase[1],$exBase[2],$exBase[3],$exBase[4],$exBase[5],$exBase[6],$row[1], $exBase[7], $row[0]);
            $exc->setModality($this->getRouteModalitys($row[0]));

            $excursio[] = $exc;
        }

        return $excursio;
    }

    public function getAllExcursionsByIdPropietari($id) {
        $excursio = [];
        $select = $this->
        connection->prepare("SELECT id_excursio, userName FROM basica, perfil WHERE id_perfil = :id and id_perfil = perfil.id");

        $select->bindParam(':id', $id);
        $select->execute();

        while ($row = $select->fetch(PDO::FETCH_NUM)) {
            $exBase = parent::getExcursioById($row[0]);

            $exc = new ExcursioBasica($exBase[1],$exBase[2],$exBase[3],$exBase[4],$exBase[5],$exBase[6],$row[1], $exBase[7], $row[0]);
            $exc->setModality($this->getRouteModalitys($row[0]));

            $excursio[] = $exc;
        }

        return $excursio;
    }

    public function getExcursioById($id) {
        $excurio = null;
        $exBase = parent::getExcursioById($id);
        $select = $this->connection->prepare("SELECT id_excursio, userName FROM basica, perfil WHERE id_excursio = :id and id_perfil = perfil.id");

        $select->bindParam(':id', $id);
        $select->execute();

        if ($row = $select->fetch(PDO::FETCH_NUM)) {

            $excurio = new ExcursioBasica($exBase[1], $exBase[2], $exBase[3], $exBase[4], $exBase[5], $exBase[6], $row[1], $exBase[7], $row[0]);
            $excurio->setModality($this->getRouteModalitys($row[0]));
            return $excurio;
        }

    }

    public function deleteExcursioById($id) {
        parent::deleteExcursioById($id);

        $select = "DELETE FROM basica WHERE id_excursio = $id";

        $stmt = $this->connection->prepare($select);
        $stmt->execute();
    }

    public function getAllExcursionsByDistance($distance) {
        $idArray = parent::getAllExcursionsByDistance($distance);

        return $this->getAllExcursionsByFiltre($idArray);
    }

    public function getAllExcursionsByDifficulty($idDiff) {
        $idArray = parent::getAllExcursionsByDifficulty($idDiff);

        return $this->getAllExcursionsByFiltre($idArray);
    }

    public function getAllExcursionsByDuration($duration) {
        $idArray = parent::getAllExcursionsByDuration($duration);

        return $this->getAllExcursionsByFiltre($idArray);
    }

    public function getAllExcursionsByText($text) {
        $idArray = parent::getAllExcursionsByText($text);

        return $this->getAllExcursionsByFiltre($idArray);
    }

    public function getAllExcursionsByFiltre($idArray) {
        $excursion = [];

        foreach ($idArray as $id)
            $excursion[] = $this->getExcursioById($id);

        return $excursion;
    }

}