<?php


class ExcursioBasicaController extends ExcursioController {

    public function __construct() {
        $this->DAO = new ExcursioBasicaDAO();
    }

    public function getAllExcursionsByIdPropietari($param){
        $excursions = $this->DAO->getAllExcursionsByIdPropietari($param['id']);

        echo $this->arrayToJson($excursions);
    }
}