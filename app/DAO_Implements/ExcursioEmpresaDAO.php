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
}