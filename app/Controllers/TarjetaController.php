<?php


class TarjetaController extends Controller {


    public function __construct() {
        $this->DAO = new TarjetaDAO();
    }


    public function insertTargeta(){
        $r = $_REQUEST;
        $targeta = new Tarjeta($r['numero'],$r['nom'],$r['lli1'],$r['lli2'],$r['cvv'],$r['dataVenciment'],$r['idPerfil']);


        $this->DAO->insert($targeta);
    }

    public function getTargeta(){
        $targeta = $this->DAO->getTargetaById($_REQUEST['numero']);

        echo json_encode($targeta->toArray());
    }

    public function deleteTargeta(){
        $this->DAO->deleteTargetaById($_REQUEST['numero']);
    }

    public function getAllTargetes(){
        $targetes = $this->DAO->getAllTargetes();
        $array = [];

        foreach ($targetes as $u)
            $array[] = $u->toArray();

        echo json_encode($array);
    }

    public function updateTargeta(){
        $id = $_REQUEST['numero'];
        $colName = $_REQUEST['colName'];
        $newValue = $_REQUEST['newValue'];

        $this->DAO->updateTargeta($id, $colName, $newValue);
    }


}