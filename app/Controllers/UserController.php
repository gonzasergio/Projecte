<?php


class UserController {

    private $DAO;

    public function __construct() {
        $this->DAO = new UsersDAO();
    }


    public function insertUser(){
        $r = $_REQUEST;
        $user = new User($r['uName'],$r['Name'],$r['sur1'],$r['sur2'],$r['dni'],$r['pNum'],$r['email'], $r['city'], $r['lvl'], $r['pass']);
        

        $this->DAO->insert($user);
    }

}