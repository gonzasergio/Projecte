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

    public function deleteRegion(){
        $this->DAO->deleteRegionById($_REQUEST['id']);
    }

    public function getAllRegion(){
        $regions = $this->DAO->getAllRegions();
        $array = [];

        foreach ($regions as $r)
            $array[] = $r->toArray();

        echo json_encode($array);
    }

    public function updateRegion(){
        $id = $_REQUEST['id'];
        $colName = $_REQUEST['colName'];
        $newValue = $_REQUEST['newValue'];

        $this->DAO->updateRegion($id, $colName, $newValue);
    }

    public function viewCRUD(){
        include '../views/regionCRUD.php';
    }

}