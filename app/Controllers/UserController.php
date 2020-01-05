<?php


class UserController {

    private $DAO;
    private $request;

    public function __construct($request) {
        $this->DAO = new UsersDAO();
        $this->request = $request;
    }


    public function insertUser(){
        var_dump($this->request);
        $r = $_REQUEST;
        // $user = new User($r['id'],$r['uName'],$r['Name'],$r['sur1'],$r['sur2'],$r['dni'],$r['pNum'],$r['email'], 1, 1, $r['pass']);
        $user = new User(1,1,1,1,1,1,11,11,1,1,1);

        $this->DAO->insert($user);
    }

}