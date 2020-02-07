<?php


class HistoryController extends Controller {

    public function __construct() {
        $this->DAO = new HistoryDAO();
    }

    public function insertHistory(){
        $r = $_REQUEST;
        $history = new History($r['img'], $r['id_propietari']);

        $this->DAO->insertHistory($history);
    }

    public function getHistory(){
        $historys = $this->DAO->getHistoryByIdPropietari($_REQUEST['idHistory']);

        $array = [];

        foreach ($historys as $u)
            $array[] = $u->toArray();

        echo json_encode($array);
    }

    public function deleteHistory(){
        $this->DAO->deleteHistoryById($_REQUEST['idHistory']);
    }

}