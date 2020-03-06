<?php


class RegionController extends Controller {

    public function __construct() {
        $this->DAO = new RegionDAO();
    }


    public function insertRegion(){
        $r = $_REQUEST;
        $region = new Region($r['name'], $r['countryId']);


        $this->DAO->insert($region);
    }

    public function getRegion(){
        $region = $this->DAO->getRegionById($_REQUEST['id']);

        echo json_encode($region->toArray());
    }

    public function deleteRegion($param){
        $this->DAO->deleteRegionById($param['id']);
    }

    public function getAllRegion(){
        $regions = $this->DAO->getAllRegions();
        $array = [];

        foreach ($regions as $r)
            $array[] = $r->toArray();

        echo json_encode($array);
    }

    public function updateRegion($param){
        $id = $param['id'];
        $colName = $_REQUEST['colName'];
        $newValue = $_REQUEST['newValue'];

        $this->DAO->updateRegion($id, $colName, $newValue);
    }

    public function viewCRUD(){
        include '../../app/Views/regionCRUD.php';
    }

}