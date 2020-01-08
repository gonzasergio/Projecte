<?php


class PromocioController extends Controller {


    public function __construct() {
        $this->DAO = new PromocionsDAO();
    }


    public function insertPromocio(){
        $r = $_REQUEST;
        $promocio = new Promocio($r['nom'],$r['preu']);
        

        $this->DAO->insert($promocio);
    }

    public function getPromocio(){
        $promocio = $this->DAO->getPromocioById($_REQUEST['id']);

        echo json_encode($promocio->toArray());
    }

    public function deletePromocio(){
        $this->DAO->deletePromocioById($_REQUEST['id']);
    }

    public function getAllPromocions(){
        $promocions = $this->DAO->getAllPromocions();
        $array = [];

        foreach ($promocions as $u)
            $array[] = $u->toArray();

        echo json_encode($array);
    }

    public function updatePromocio(){
        $id = $_REQUEST['id'];
        $colName = $_REQUEST['colName'];
        $newValue = $_REQUEST['newValue'];

        $this->DAO->updatePromocio($id, $colName, $newValue);
    }


}