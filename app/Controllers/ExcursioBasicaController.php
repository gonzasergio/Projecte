<?php


class ExcursioBasicaController extends ExcursioController {

    public function __construct() {
        $this->DAO = new ExcursioBasicaDAO();
    }

    public function getAllExcursionsByIdPropietari($param){
        $excursions = $this->DAO->getAllExcursionsByIdPropietari($param['id']);

        echo $this->arrayToJson($excursions);
    }

    public function insertExcursio(){
        $r = $_REQUEST;
        $excursio = new ExcursioBasica($r['titol'], $r['distancia'],$r['id_dificultat'],$r['duracio'],$r['maxim_persones'],$r['descripcio'], $r['id_propietari'], $r['zone']);

        echo json_encode([$this->DAO->insert($excursio)]);
    }

    public function insertMod($props){
        $this->DAO->insertMod($props['id'], $_POST['mod']);
    }
}