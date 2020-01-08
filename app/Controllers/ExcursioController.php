<?php


class ExcursioController extends Controller {

    public function __construct() {
        $this->DAO = new ExcursionsDAO();
    }

    public function insertExcursio(){
        $r = $_REQUEST;
        $excursio = new Excursio($r['distancia'],$r['id_dificultat'],$r['duracio'],$r['preu'],$r['maxim_persones'],$r['descripcio']);
        

        $this->DAO->insert($excursio);
    }

    public function getExcursio(){
        $excursio = $this->DAO->getExcursioById($_REQUEST['id']);

        echo json_encode($excursio->toArray());
    }
    
    public function deleteExcursio(){
        $this->DAO->deleteExcursioById($_REQUEST['id']);
    }

    public function getAllExcursions(){
        $excursions = $this->DAO->getAllExcursions();
        $array = [];

        foreach ($excursions as $u)
            $array[] = $u->toArray();

        echo json_encode($array);
    }

    public function updateExcursio(){
        $id = $_REQUEST['id'];
        $colName = $_REQUEST['colName'];
        $newValue = $_REQUEST['newValue'];

        $this->DAO->updateExcursio($id, $colName, $newValue);
    }

}