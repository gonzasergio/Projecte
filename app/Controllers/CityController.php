<?php


class CityController extends Controller {

    public function __construct() {
        $this->DAO = new CityDAO();
    }


    public function insertCity(){
        $r = $_REQUEST;
        $city = new City($r['name'], $r['regionId']);


        $this->DAO->insert($city);
    }

    public function getCity(){
        $city = $this->DAO->getCityById($_REQUEST['id']);

        echo json_encode($city->toArray());
    }

    public function deleteCity($param){
        $this->DAO->deleteCityById($param['id']);
    }

    public function getAllCity(){
        $regions = $this->DAO->getAllCitys();
        $array = [];

        foreach ($regions as $r)
            $array[] = $r->toArray();

        echo json_encode($array);
    }

    public function updateCity(){
        $id = $_REQUEST['id'];
        $colName = $_REQUEST['colName'];
        $newValue = $_REQUEST['newValue'];

        $this->DAO->updateCity($id, $colName, $newValue);
    }

    public function viewCRUD(){
        include '../../app/Views/cityCRUD.php';
    }

}