<?php


class PaypalController extends Controller {


    public function __construct() {
        $this->DAO = new PaypalDAO();
    }


    public function insertPaypal(){
        $r = $_REQUEST;
        $paypal = new Paypal($r['idPerfil'],$r['email']);


        $this->DAO->insert($paypal);
    }

    public function getPaypal($param){
        $paypals = $this->DAO->getPaypalById($param['id']);
        $array = [];

        foreach ($paypals as $u)
            $array[] = $u->toArray();

        echo json_encode($array);
    }

    public function deletePaypal($param){
        $this->DAO->deletePaypalByEmail($param['id']);
    }

    public function getAllPaypals(){
        $paypals = $this->DAO->getAllPaypals();
        $array = [];

        foreach ($paypals as $u)
            $array[] = $u->toArray();

        echo json_encode($array);
    }

    public function updatePaypal(){
        $email = $_REQUEST['email'];
        $colName = $_REQUEST['colName'];
        $newValue = $_REQUEST['newValue'];

        $this->DAO->updatePaypal($email, $colName, $newValue);
    }


}