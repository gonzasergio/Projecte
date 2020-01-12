<?php


class NivellController extends Controller {

    public function __construct() {
        $this->DAO = new NivellDAO();
    }


    public function insertNivell(){
        $r = $_REQUEST;
        $nivell = new Nivell($r['nom']);

        $this->DAO->insert($nivell);
    }

    public function getNivell(){
        $nivell = $this->DAO->getNivellById($_REQUEST['id']);

        echo json_encode($nivell->toArray());
    }

    public function deleteNivell(){
        $this->DAO->deleteNivellById($_REQUEST['id']);
    }

    public function getAllNivells(){
        $nivells = $this->DAO->getAllNivells();
        $array = [];

        foreach ($nivells as $u)
            $array[] = $u->toArray();

        echo json_encode($array);
    }

    public function updateNivell(){
        $id = $_REQUEST['id'];
        $colName = $_REQUEST['colName'];
        $newValue = $_REQUEST['newValue'];

        $this->DAO->updateNivell($id, $colName, $newValue);
    }

    public function viewCRUD(){
        include '../../app/views/nivellCRUD.php';
    }

}