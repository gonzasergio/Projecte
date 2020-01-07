<?php


class CursController extends Controller {

    public function __construct() {
        $this->DAO = new CursosDAO();
    }

    public function insertCurs(){
        $r = $_REQUEST;
        $curs = new Curs($r['duracio'],$r['preu'],$r['maxim_persones'],$r['descripcio'],$r['id_promocio'],$r['id_dificultat'],$r['descripcio']);
        

        $this->DAO->insert($curs);
    }

    public function getCurs(){
        $curs = $this->DAO->getCursById($_REQUEST['id']);

        echo json_encode($curs->toArray());
    }
    
    public function deleteCurs(){
        $this->DAO->deleteCursById($_REQUEST['id']);
    }

    public function getAllCursos(){
        $cursos = $this->DAO->getAllCursos();
        $array = [];

        foreach ($cursos as $u)
            $array[] = $u->toArray();

        echo json_encode($array);
    }

    public function updateCurs(){
        $id = $_REQUEST['id'];
        $colName = $_REQUEST['colName'];
        $newValue = $_REQUEST['newValue'];

        $this->DAO->updateCurs($id, $colName, $newValue);
    }

}