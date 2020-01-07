<?php


class PaypalController extends Controller {


    public function __construct() {
        $this->DAO = new PaypalDAO();
    }


    public function insertPaypal(){
        $r = $_REQUEST;
        $paypal = new Paypal($r['email'],$r['idPerfil']);


        $this->DAO->insert($paypal);
    }

    public function getPaypal(){
        $paypal = $this->DAO->getPaypalById($_REQUEST['email']);

        echo json_encode($paypal->toArray());
    }

    public function deletePaypal(){
        $this->DAO->deletePaypalById($_REQUEST['email']);
    }

    public function getAllPaypals(){
        $paypals = $this->DAO->getAllPaypals();
        $array = [];

        foreach ($paypals as $u)
            $array[] = $u->toArray();

        echo json_encode($array);
    }

    public function updatePaypal(){
        $id = $_REQUEST['email'];
        $colName = $_REQUEST['colName'];
        $newValue = $_REQUEST['newValue'];

        $this->DAO->updatePaypal($id, $colName, $newValue);
    }


}