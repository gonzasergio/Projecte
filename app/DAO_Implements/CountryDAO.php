<?php


class CountryDAO implements DAO_Conurty {

    use FormatSQL;
    private $connection;

    public function __construct() {
        $this->connection = DBConnection::getInstance('db_goatrails')->getConnection();
    }

    public function insert(Country $country) {
        $name = $this->packUp($country->getName());

        $insert = "INSERT INTO pais (`nom`) values ($name)";

        $this->connection->prepare($insert)->execute();

    }

    public function getCountryById($id) {
        $country = null;
        $select = "SELECT * FROM pais WHERE id = $id";

        $stmt = $this->connection->prepare($select);
        $stmt->execute();

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $country = new Country($row[1], $row[0]);
        }

        return $country;

    }

    public function deleteCountryById($id) {
        $select = "DELETE FROM pais WHERE id = $id";

        $stmt = $this->connection->prepare($select);
        $stmt->execute();
    }

    public function getAllCountrys() {
        $countrys = [];
        $select = "SELECT * FROM pais";

        $stmt = $this->connection->prepare($select);
        $stmt->execute();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $countrys[] = new Country($row[1], $row[0]);
        }

        return $countrys;
    }

    public function updateCountry($id, $colName, $newValue) {
        $newValue = $this->packUp($newValue);
        $update = "UPDATE pais SET $colName = $newValue WHERE id = $id";

        $this->connection->prepare($update)->execute();
    }

}