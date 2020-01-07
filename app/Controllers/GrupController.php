<?php


class GrupController extends Controller {


    public function __construct() {
        $this->DAO = new GrupDAO();
    }


    public function insertGrup(){
        $r = $_REQUEST;
        $grup = new Grup($r['idPerfil'],$r['idExcursio']);


        $this->DAO->insert($grup);
    }

    public function getGrup(){
        $grup = $this->DAO->getAllMembersByGrupId($_REQUEST['idExcursio']);

        echo json_encode($grup->toArray());
    }

    public function deleteGrup(){
        $this->DAO->deleteGrupById($_REQUEST['idExcursio']);
    }

    public function getAllGrups(){
        $grups = $this->DAO->getAllGrups();
        $array = [];

        foreach ($grups as $u)
            $array[] = $u->toArray();

        echo json_encode($array);
    }

    public function updateGrup(){
        $idPerfil = $_REQUEST['idPerfil'];
        $idExcursio = $_REQUEST['idExcursio'];
        $colName = $_REQUEST['colName'];
        $newValue = $_REQUEST['newValue'];

        $this->DAO->updateGrup($idPerfil, $idExcursio, $colName, $newValue);
    }


}