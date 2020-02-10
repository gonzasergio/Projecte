<?php


class CardController extends Controller {


    public function __construct() {
        $this->DAO = new CardDAO();
    }


    public function insertCard(){
        $r = $_REQUEST;
        $targeta = new Card($r['numero'],$r['nom'],$r['lli1'],$r['lli2'],$r['cvv'],$r['dataVenciment'],$r['idPerfil']);


        $this->DAO->insert($targeta);
    }

    public function getCard($param){
        $targeta = $this->DAO->getCardById($param['id']);

        echo json_encode($targeta->toArray());
    }

    public function deleteCard($param){
        $this->DAO->deleteCardByNumber($param['id']);
    }

    public function getAllCards(){
        $targetes = $this->DAO->getAllCards();
        $array = [];

        foreach ($targetes as $u)
            $array[] = $u->toArray();

        echo json_encode($array);
    }

    public function updateCard(){
        $id = $_REQUEST['numero'];
        $colName = $_REQUEST['colName'];
        $newValue = $_REQUEST['newValue'];

        $this->DAO->updateCard($id, $colName, $newValue);
    }


}