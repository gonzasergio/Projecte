<?php


class HorariController extends Controller {

    public function __construct() {
        $this->DAO = new HorarisDAO();
    }

    public function insertHorari(){
        $r = $_REQUEST;
        $horari = new Horari($r['hora'],$r['minut']);
        

        $this->DAO->insert($horari);
    }

    public function getHorari(){
        $horari = $this->DAO->getHorariById($_REQUEST['id']);

        echo json_encode($horari->toArray());
    }
    
    public function deleteHorari(){
        $this->DAO->deleteHorariById($_REQUEST['id']);
    }

    public function getAllHoraris(){
        $horaris = $this->DAO->getAllHoraris();
        $array = [];

        foreach ($horaris as $u)
            $array[] = $u->toArray();

        echo json_encode($array);
    }

    public function updateHorari(){
        $id = $_REQUEST['id'];
        $colName = $_REQUEST['colName'];
        $newValue = $_REQUEST['newValue'];

        $this->DAO->updateExcursio($id, $colName, $newValue);
    }

}