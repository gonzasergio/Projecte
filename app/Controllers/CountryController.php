<?php


class CountryController extends Controller {

    public function __construct() {
        $this->DAO = new CountryDAO();
    }


    public function insertCountry(){
        $r = $_REQUEST;
        $country = new Country($r['name']);


        $this->DAO->insert($country);
    }

    public function getCountry(){
        $country = $this->DAO->getCountryById($_REQUEST['id']);

        echo json_encode($country->toArray());
    }

    public function deleteCountry(){
        $this->DAO->deleteCountryById($_REQUEST['id']);
    }

    public function getAllCountry(){
        $users = $this->DAO->getAllCountrys();
        $array = [];

        foreach ($users as $u)
            $array[] = $u->toArray();

        echo json_encode($array);
    }

    public function updateCountry(){
        $id = $_REQUEST['id'];
        $colName = $_REQUEST['colName'];
        $newValue = $_REQUEST['newValue'];

        $this->DAO->updateCountry($id, $colName, $newValue);
    }

}