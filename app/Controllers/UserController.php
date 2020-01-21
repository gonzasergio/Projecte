<?php


class UserController extends Controller {


    public function __construct() {
        $this->DAO = new UsersDAO();
    }


    public function insertUser(){
        $r = $_REQUEST;
        $user = new User($r['uName'],$r['Name'],$r['sur1'],$r['sur2'],$r['dni'],$r['pNum'],$r['email'], $r['city'], $r['lvl'], $r['pass']);
        

        $this->DAO->insert($user);
    }

    public function getUser(){
        $user = $this->DAO->getUserById($_REQUEST['id']);

        echo json_encode($user->toArray());
    }

    public function deleteUser(){
        $this->DAO->deleteUserById($_REQUEST['id']);
    }

    public function getAllUsers(){
        $users = $this->DAO->getAllUsers();
        $array = [];

        foreach ($users as $u)
            $array[] = $u->toArray();

        echo json_encode($array);
    }

    public function updateUser(){
        $id = $_REQUEST['id'];
        $colName = $_REQUEST['colName'];
        $newValue = $_REQUEST['newValue'];

        $this->DAO->updateUser($id, $colName, $newValue);
    }

    public function getMyUserId(){
        echo json_encode(['id' => $_SESSION['id']]);
    }


}