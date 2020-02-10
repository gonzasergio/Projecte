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

    public function getNivell($param){
        $nivell = $this->DAO->getNivellById($param['id']);

        echo json_encode($nivell->toArray());
    }

    public function deleteNivell($param){
        $this->DAO->deleteNivellById($param['id']);
    }

    public function getAllNivells(){
        $nivells = $this->DAO->getAllNivells();
        $array = [];

        foreach ($nivells as $u)
            $array[] = $u->toArray();

        echo json_encode($array);
    }

    public function updateNivell($param){
        $id = $param['id'];
        $colName = $_REQUEST['colName'];
        $newValue = $_REQUEST['newValue'];

        $this->DAO->updateNivell($id, $colName, $newValue);
    }

    public function viewCRUD(){
        include '../../app/Views/levelCRUD.php';
    }

}