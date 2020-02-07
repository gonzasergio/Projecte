<?php


class CityDAO implements DAO_City {

    use FormatSQL;
    private $connection;

    public function __construct() {
        $this->connection = DBConnection::getInstance('db_goatrails')->getConnection();
    }

    public function insert(City $city) {
        $name = $city->getName();
        $regionId = $city->getRegionId();
        $insert = $this->
        connection->prepare("INSERT INTO ciutat (`nom`, `id_regio`) values (:name, :regionId)");

        $insert->bindParam(':name', $name);
        $insert->bindParam(':regionId', $regionId);

        $insert->execute();

    }

    public function getCityById($id) {
        $city = null;
        $select = $this->connection->prepare("SELECT * FROM ciutat WHERE id = :id");
        $select->bindParam(':id', $id);

        $select->execute();

        if ($row = $select->fetch(PDO::FETCH_NUM)) {
            $city = new City($row[1], $row[2], $row[0]);
        }

        return $city;

    }

    public function deleteCityById($id) {
        $select = $this->connection->prepare("DELETE FROM ciutat WHERE id = :id");
        $select->bindParam(':id', $id);

        $select->execute();
    }

    public function getAllCitys() {
        $citys = [];
        $select = "SELECT * FROM ciutat";

        $stmt = $this->connection->prepare($select);
        $stmt->execute();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $citys[] = new City($row[1], $row[2],  $row[0]);
        }

        return $citys;
    }

    public function updateCity($id, $colName, $newValue) {
        $update = $this->connection->prepare("UPDATE ciutat SET :colName = :newValue WHERE id = :id");
        $update->bindParam(':colName', $colName);
        $update->bindParam(':newValue', $newValue);
        $update->bindParam(':id', $id);

        $update->execute();
    }
}
