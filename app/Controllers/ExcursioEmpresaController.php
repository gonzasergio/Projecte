<?php


class ExcursioEmpresaController extends ExcursioController {

    public function __construct() {
        $this->DAO = new ExcursioEmpresaDAO();
    }

    public function getAllExcursionsByIdPropietari(){
        $excursions = $this->DAO->getAllExcursionsByIdPropietari($_REQUEST['id']);
        $array = [];

        foreach ($excursions as $u)
            $array[] = $u->toArray();

        echo json_encode($array);
    }

}