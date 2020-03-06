<?php


class CountryDAO implements DAO_Conurty {

    use FormatSQL;
    private $connection;

    public function __construct() {
        $this->connection = DBConnection::getInstance('db_goatrails')->getConnection();
    }

    public function insert(Country $country) {
        $name = $country->getName();

        $insert = $this->
        connection->prepare("INSERT INTO pais (`nom`) values (:name)");
        $insert->bindParam(':name', $name);

        $insert->execute();

    }

    public function getCountryById($id) {
        $country = null;
        $select = $this->connection->prepare("SELECT * FROM pais WHERE id = :id");
        $select->bindParam(':id', $id);

        $select->execute();

        if ($row = $select->fetch(PDO::FETCH_NUM)) {
            $country = new Country($row[1], $row[0]);
        }

        return $country;

    }

    public function deleteCountryById($id) {
        $select = $this->connection->prepare("DELETE FROM pais WHERE id = :id");
        $select->bindParam(':id', $id);

        $select->execute();
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
        $update = $this->connection->prepare("UPDATE pais SET $colName = :newValue WHERE id = :id");
        $update->bindParam(':newValue', $newValue);
        $update->bindParam(':id', $id);

        $update->execute();
    }

}