<?php


class CityDAO implements DAO_City {

    use FormatSQL;
    private $connection;

    public function __construct() {
        $this->connection = DBConnection::getInstance('db_goatrails')->getConnection();
    }

    public function insert(City $city) {
        $name = $this->packUp($city->getName());
        $regionId = $this->packUp($city->getRegionId());

        $insert = "INSERT INTO ciutat (`nom`, `id_regio`) values ($name, $regionId)";

        $this->connection->prepare($insert)->execute();

    }

    public function getCityById($id) {
        $city = null;
        $select = "SELECT * FROM ciutat WHERE id = $id";

        $stmt = $this->connection->prepare($select);
        $stmt->execute();

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $city = new City($row[1], $row[2], $row[0]);
        }

        return $city;

    }

    public function deleteCityById($id) {
        $select = "DELETE FROM ciutat WHERE id = $id";

        $stmt = $this->connection->prepare($select);
        $stmt->execute();
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
        $newValue = $this->packUp($newValue);
        $update = "UPDATE ciutat SET $colName = $newValue WHERE id = $id";

        $this->connection->prepare($update)->execute();
    }
}