<?php


interface DAO_Conurty {

    public function insert(Country $country);

    public function getCountryById($id);

    public function deleteCountryById($id);

    public function getAllCountrys();

    public function updateCountry($id, $colName, $newValue);

}