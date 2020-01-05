<?php

class UsersDAO implements DAO_User {

    private $connection;

    public function __construct() {
        $this->connection = DBConnection::getInstance('db_goatrails')->getConnection();
    }

    public function insert(User $user) {
        $userName = '"' . $user->getUserName() . '"';
        $name = '"' . $user->getName(). '"';
        $surname1 = '"' . $user->getSurname1(). '"';
        $surname2 = '"' . $user->getSurname2(). '"';
        $dni = '"' . $user->getDni(). '"';
        $phoneNumber = '"' . $user->getPhoneNumber(). '"';
        $email = '"' . $user->getEmail(). '"';
        $city = '"' . $user->getCity(). '"';
        $lvl = '"' . $user->getLvl(). '"';
        $pass = '"' . $user->getPass(). '"';

        $insert = "INSERT INTO perfil (`nom`,`userName`,`llinatge1`,`llinatge2`,`dni`,`telefon`,`email`,`id_ciutat`,`id_nivell`,`pass`)
        values ($userName, $name, $surname1, $surname2, $dni, $phoneNumber, $email, $city, $lvl, $pass)";

        $this->connection->prepare($insert)->execute();

    }

    public function getUserById($id) {
        // TODO: Implement getById() method.
    }

    public function deleteUserById($id) {
        // TODO: Implement getById() method.
    }

    public function getAllUsers() {
        // TODO: Implement getAll() method.
    }
}