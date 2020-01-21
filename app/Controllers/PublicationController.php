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

    public function getPublication(){
        $publication = $this->DAO->getPublicationById($_REQUEST['id']);

        echo json_encode($publication->toArray());
    }

    public function deletePublication(){
        $this->DAO->deletePublicationById($_REQUEST['id']);
    }

    public function getUserPublications(){
        $publications = $this->DAO->getAllPublicationsFromUser($_REQUEST['id']);
        $array = [];

        foreach ($publications as $p)
            $array[] = $p->toArray();

        echo json_encode($array);
    }

    public function getRoutePublications(){
        $publications = $this->DAO->getAllPublicationsFromRoute($_REQUEST['id']);
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