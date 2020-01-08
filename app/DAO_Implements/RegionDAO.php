<?php


class RegionDAO implements DAO_Region {

    use FormatSQL;
    private $connection;

    public function __construct() {
        $this->connection = DBConnection::getInstance('db_goatrails')->getConnection();
    }

    public function insert(Region $region) {
        $name = $this->packUp($region->getName());
        $countryId = $this->packUp($region->getCountryId());

        $insert = "INSERT INTO regio (`nom`, `id_pais`) values ($name, $countryId)";

        $this->connection->prepare($insert)->execute();

    }

    public function getRegionById($id) {
        $region = null;
        $select = "SELECT * FROM regio WHERE id = $id";

        $stmt = $this->connection->prepare($select);
        $stmt->execute();

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $region = new Region($row[1], $row[2], $row[0]);
        }

        return $region;

    }

    public function deleteRegionById($id) {
        $select = "DELETE FROM regio WHERE id = $id";

        $stmt = $this->connection->prepare($select);
        $stmt->execute();
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
        $newValue = $this->packUp($newValue);
        $update = "UPDATE regio SET $colName = $newValue WHERE id = $id";

        $this->connection->prepare($update)->execute();
    }

}