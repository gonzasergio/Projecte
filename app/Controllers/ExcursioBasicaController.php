<?php


class ExcursioBasicaController extends ExcursioController {

    public function __construct() {
        $this->DAO = new ExcursioBasicaDAO();
    }

}