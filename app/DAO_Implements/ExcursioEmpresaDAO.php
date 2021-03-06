<?php


class ExcursioEmpresaDAO extends ExcursionsDAO {

    public function insert(Excursio $excursio) {
        $id = parent::insert($excursio);
        $instructor = $excursio->getInstructior();
        $price = $excursio->getPrice();

        $insert = $this->connection->prepare
        ("INSERT INTO de_empresa
        values (:id_exc, :id_perf, :price)");

        $insert->bindParam(':id_exc', $id);
        $insert->bindParam(':id_perf', $instructor);
        $insert->bindParam(':price', $price);

        $insert->execute();
    }

    public function getAllExcursions() {
        $excursio = [];
        $select = "SELECT * FROM de_empresa";

        $stmt = $this->connection->prepare($select);
        $stmt->execute();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $exBase = parent::getExcursioById($row[0]);

            $excursio[] = new ExcursioEmpresa($exBase[1],$exBase[2],$exBase[3],$exBase[4],$exBase[5],$exBase[6],$row[1],$row[2],$row[0]);
        }

        return $excursio;
    }

    public function getAllExcursionsByIdPropietari($id) {
        $excursio = [];
        $select = $this->
        connection->prepare("SELECT * FROM de_empresa WHERE id_perfil = :id");

        $select->bindParam(':id', $id);
        $select->execute();

        while ($row = $select->fetch(PDO::FETCH_NUM)) {
            $exBase = parent::getExcursioById($row[0]);

            $excursio[] = new ExcursioEmpresa($exBase[1],$exBase[2],$exBase[3],$exBase[4],$exBase[5],$exBase[6],$row[1],$row[2],$row[0]);
        }

        return $excursio;
    }

    public function getAllExcursionsByPric($price) {
        $excursio = [];
        $select = $this->
        connection->prepare("SELECT * FROM de_empresa WHERE preu = :price");

        $select->bindParam(':price', $price);
        $select->execute();

        while ($row = $select->fetch(PDO::FETCH_NUM)) {
            $exBase = parent::getExcursioById($row[0]);

            $excursio[] = new ExcursioEmpresa($exBase[1],$exBase[2],$exBase[3],$exBase[4],$exBase[5],$exBase[6],$row[1],$row[2],$row[0]);
        }

        return $excursio;
    }

    public function getExcursioById($id) {
        $exBase = parent::getExcursioById($id);
        $select = $this->connection->prepare("SELECT * FROM de_empresa WHERE id_excursio = :id");

        $select->bindParam(':id', $id);
        $select->execute();

        if ($row = $select->fetch(PDO::FETCH_NUM))
            return new ExcursioEmpresa($exBase[1],$exBase[2],$exBase[3],$exBase[4],$exBase[5],$exBase[6],$row[1],$row[2],$row[0]);

    }

    public function deleteExcursioById($id) {
        parent::deleteExcursioById($id);

        $select = "DELETE FROM de_empresa WHERE id_excursio = $id";

        $stmt = $this->connection->prepare($select);
        $stmt->execute();
    }

    public function updateExcursio($id, $colName, $newValue) {
        if($colName == 'preu'){
            $newValue = $this->packUp($newValue);
            $update = "UPDATE de_empresa SET $colName = $newValue WHERE id_excursio = $id";

            $this->connection->prepare($update)->execute();
        } else
            parent::updateExcursio($id, $colName, $newValue);
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

    public function getAllExcursionsByModality($idMod) {
        $idArray = parent::getAllExcursionsByModality($idMod);

        return $this->getAllExcursionsByFiltre($idArray);
    }

    public function getAllExcursionsByFiltre($idArray) {
        $excursion = [];

        foreach ($idArray as $id)
            $excursion[] = $this->getExcursioById($id);

        return $excursion;
    }




}