<?php


class ModalitatController extends Controller {

    public function __construct() {
        $this->DAO = new ModalitatDAO();
    }


    public function insertModalitat(){
        $r = $_REQUEST;
        $modalitat = new Modalitat($r['nom']);

        $this->DAO->insert($modalitat);
    }

    public function getModalitat($param){
        $modalitat = $this->DAO->getModalitatById($param['id']);

        echo json_encode($modalitat->toArray());
    }

    public function deleteModalitat($param){
        $this->DAO->deleteModalitatById($param['id']);
    }

    public function getAllModalitats(){
        $modalitats = $this->DAO->getAllModalitats();
        $array = [];

        foreach ($modalitats as $u)
            $array[] = $u->toArray();

        echo json_encode($array);
    }

    public function updateModalitat($param){
        $id = $param['id'];
        $colName = $_REQUEST['colName'];
        $newValue = $_REQUEST['newValue'];

        $this->DAO->updateModalitat($id, $colName, $newValue);
    }

    public function viewCRUD(){
        include '../../app/Views/modalityCRUD.php';
    }

}