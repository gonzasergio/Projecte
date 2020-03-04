<?php


class PublicationController extends Controller {


    public function __construct() {
        $this->DAO = new PublicationDAO();
    }

    public function insertPublication(){
        $r = $_REQUEST;

        if(!isset($r['route']))
            $r['route'] = null;

        $name =  $this->DAO->getMaxId($r['user']) . '-' . $r['user'];

        $img = '/img/' . $name . '.jpg';

        $publication = new Publication($img , $r['text'], $r['user'], $r['route']);

        $this->DAO->insert($publication);

        echo json_encode([$name]);
    }

    public function insertPublicationImg($param){
        var_dump($_REQUEST);
        $uploaddir = '../img/';
        $uploadfile = $uploaddir . $param['id'] . '.jpg';

        move_uploaded_file($_FILES['img']['tmp_name'], $uploadfile);
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

    public function getFollowersPublication($param){
        $publications = $this->DAO->getFollowsPublications($param['id']);
        $array = [];

        foreach ($publications as $p)
            $array[] = $p->toArray();

        echo json_encode($array);
    }
}