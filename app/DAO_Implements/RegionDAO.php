<?php


class RegionDAO implements DAO_Region {

    use FormatSQL;
    private $connection;

    public function __construct() {
        $this->connection = DBConnection::getInstance('db_goatrails')->getConnection();
    }

    public function insert(Region $region) {
        $name = $region->getName();
        $countryId = $region->getCountryId();

        $insert = $this->
        connection->prepare("INSERT INTO regio (`nom`, `id_pais`) values (:name, :countryId)");
        $insert->bindParam(':name', $name);
        $insert->bindParam(':countryId', $countryId);

        $insert->execute();

    }

    public function getRegionById($id) {
        $region = null;
        $select = $this->connection->prepare("SELECT * FROM regio WHERE id = :id");
        $select->bindParam(':id', $id);

        $select->execute();

        if ($row = $select->fetch(PDO::FETCH_NUM)) {
            $region = new Region($row[1], $row[2], $row[0]);
        }

        return $region;

    }

    public function deleteRegionById($id) {
        $select = $this->connection->prepare("DELETE FROM regio WHERE id = :id");
        $select->bindParam(':id', $id);

        $select->execute();
    }

    public function getAllRegions() {
        $regions = [];
        $select = "SELECT * FROM regio";

        $stmt = $this->connection->prepare($select);
        $stmt->execute();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $regions[] = new Region($row[1], $row[2], $row[0]);
        }

        return $regions;
    }

    public function updateRegion($id, $colName, $newValue) {
        $update = $this->connection->prepare("UPDATE regio SET :colName = :newValue WHERE id = :id");
        $update->bindParam(':colName', $colName);
        $update->bindParam(':newValue', $newValue);
        $update->bindParam(':id', $id);

        $update->execute();
    }

}