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

    public function getModalitat(){
        $modalitat = $this->DAO->getNivellById($_REQUEST['id']);

        echo json_encode($modalitat->toArray());
    }

    public function deleteModalitat(){
        $this->DAO->deleteModalitatById($_REQUEST['id']);
    }

    public function getAllModalitats(){
        $modalitats = $this->DAO->getAllModalitats();
        $array = [];

        foreach ($modalitats as $u)
            $array[] = $u->toArray();

        echo json_encode($array);
    }

    public function updateModalitat(){
        $id = $_REQUEST['id'];
        $colName = $_REQUEST['colName'];
        $newValue = $_REQUEST['newValue'];

        $this->DAO->updateModalitat($id, $colName, $newValue);
    }

    public function viewCRUD(){
        include 'modalitatCRUD.php';
    }

}