<?php


interface DAO_Region {

    public function insert(Region $region);

    public function getRegionById($id);

    public function deleteRegionById($id);

    public function getAllRegions();

    public function updateRegion($id, $colName, $newValue);

}