<?php


class UserController extends Controller {


    public function __construct() {
        $this->DAO = new UsersDAO();
    }


    public function insertUser(){
        $r = $_REQUEST;
        $user = User::basicConstructor($r['uName'],$r['name'],$r['sur1'],$r['email'], $r['pass']);
        

        $this->DAO->insert($user);
    }

    public function getUser($param){
        $user = $this->DAO->getUserByUsername($param['id']);

        echo json_encode($user->toArray());
    }

    public function deleteUser($param){
        $this->DAO->deleteUserById($param['id']);
    }

    public function getAllUsers(){
        $users = $this->DAO->getAllUsers();
        $array = [];

        foreach ($users as $u)
            $array[] = $u->toArray();

        echo json_encode($array);
    }

    public function updateUser($param){
        $id = $param['id'];
        $colName = $_REQUEST['colName'];
        $newValue = $_REQUEST['newValue'];

        $this->DAO->updateUser($id, $colName, $newValue);
    }

    public function getMyUserId(){
        echo json_encode(['id' => $_SESSION['id']]);
    }

    public function login(){
        $pass = $_REQUEST['password'];
        $userName = $_REQUEST['userName'];
        $flag = 2;

        if($id = $this->DAO->compUserCredentials($userName, $pass)){
            $_SESSION["AUTH"]=true;
            $_SESSION["id"]=$id;
            $_SESSION["user"]=ucfirst(strtolower($userName));
            $flag = 0;
        }

        echo $flag;
    }

    public function getMyUser(){
        $this->getUser(['id' => $_SESSION['id']]);
    }
}