<?php


interface DAO_Promocio {

    public function insert(Promocio $promocio);

    public function getCountryById($id);

    public function deleteCountryById($id);

    public function getAllCountrys();

    public function updateCountry($id, $colName, $newValue);

}