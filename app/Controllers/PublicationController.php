<?php


class PublicationController extends Controller {


    public function __construct() {
        $this->DAO = new PublicationDAO();
    }

    public function insertPublication(){
        $r = $_REQUEST;
        $publication = new Publication($r['img'], $r['text'], $r['user'], $r['route']);

        $this->DAO->insert($publication);
    }

    public function getPublication($param){
        $publication = $this->DAO->getPublicationById($param['id']);

        echo json_encode($publication->toArray());
    }

    public function deletePublication($param){
        $this->DAO->deletePublicationById($param['id']);
    }

    public function getUserPublications($param){
        $publications = $this->DAO->getAllPublicationsFromUser($param['id']);
        $array = [];

        foreach ($publications as $p)
            $array[] = $p->toArray();

        echo json_encode($array);
    }

    public function getRoutePublications($param){
        $publications = $this->DAO->getAllPublicationsFromRoute($param['id']);
        $array = [];

        foreach ($publications as $p)
            $array[] = $p->toArray();

        echo json_encode($array);
    }

    public function updatePublication(){
        $id = $_REQUEST['id'];
        $colName = $_REQUEST['colName'];
        $newValue = $_REQUEST['newValue'];

        $this->DAO->updatePublication($id, $colName, $newValue);
    }

    public function getFollowersPublication(){
        $publications = $this->DAO->getFollowsPublications($_SESSION['id']);
        $array = [];

        foreach ($publications as $p)
            $array[] = $p->toArray();

        echo json_encode($array);
    }
}