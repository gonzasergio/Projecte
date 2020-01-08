<?php


interface DAO_City {

    public function insert(City $city);

    public function getCityById($id);

    public function deleteCityById($id);

    public function getAllCitys();

    public function updateCity($id, $colName, $newValue);

}