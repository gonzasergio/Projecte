<?php


class ExcursioController extends Controller {

    public function insertExcursio(){
        $r = $_REQUEST;
        $excursio = new Excursio($r['titol'], $r['distancia'],$r['id_dificultat'],$r['duracio'],$r['preu'],$r['maxim_persones'],$r['descripcio'], $r['id_propietari']);
        

        $this->DAO->insert($excursio);
    }

    public function getExcursio($param){
        $excursio = $this->DAO->getExcursioById($param['id']);

        echo json_encode($excursio->toArray());
    }
    
    public function deleteExcursio(){
        $this->DAO->deleteExcursioById($_REQUEST['id']);
    }

    public function getAllExcursions(){
        $excursions = $this->DAO->getAllExcursions();

        echo $this->arrayToJson($excursions);
    }


    public function updateExcursio(){
        $id = $_REQUEST['id'];
        $colName = $_REQUEST['colName'];
        $newValue = $_REQUEST['newValue'];

        $this->DAO->updateExcursio($id, $colName, $newValue);
    }

    public function getAllExcursionsByDistance(){
        $excursions = $this->DAO->getAllExcursionsByDistance($_REQUEST['distance']);

        echo $this->arrayToJson($excursions);
    }

    public function getAllExcursionsByDifficulty() {
        $excursions = $this->DAO->getAllExcursionsByDifficulty($_REQUEST['diff']);

        echo $this->arrayToJson($excursions);
    }

    public function getAllExcursionsByPric() {
        $excursions = $this->DAO->getAllExcursionsByDifficulty($_REQUEST['price']);

        echo $this->arrayToJson($excursions);
    }

    public function getAllExcursionsByDuration() {
        $excursions = $this->DAO->getAllExcursionsByDifficulty($_REQUEST['duration']);

        echo $this->arrayToJson($excursions);
    }

    public function getAllExcursionsByText() {
        $excursions = $this->DAO->getAllExcursionsByText($_REQUEST['text']);

        echo $this->arrayToJson($excursions);
    }

    public function getAllExcursionsByModality(){
        $mod = json_decode($_REQUEST['modality'], true);
        $excursions = $this->DAO->getAllExcursionsByModality($mod);

        echo json_encode($excursions);
    }

    public function getView($param){
        $_GET['id'] = $param['id'];

        include "../../app/Views/excursio.php";
    }

    public function getRouteAvg($param){
        $excursions = $this->DAO->getRouteAvg($param['id']);

        echo json_encode($excursions);
    }
}