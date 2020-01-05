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
        $user = null;
        $select = "SELECT * FROM perfil WHERE id = $id";

        $stmt = $this->connection->prepare($select);
        $stmt->execute();

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $user = new User($row[1], $row[2], $row[3], $row[4], $row[5], $row[6], $row[7], $row[8], $row[9], $row[10], $row[10]);
        }

        return $user;

    }

    public function deleteUserById($id) {
        $user = null;
        $select = "SELECT * FROM perfil WHERE id = $id";

        $stmt = $this->connection->prepare($select);
        $stmt->execute();

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $user = new User($row[1], $row[2], $row[3], $row[4], $row[5], $row[6], $row[7], $row[8], $row[9], $row[10], $row[10]);
        }

        return $user;
    }

    public function getAllUsers() {
        $users = [];
        $select = "SELECT * FROM perfil";

        $stmt = $this->connection->prepare($select);
        $stmt->execute();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $users[] = new User($row[1], $row[2], $row[3], $row[4], $row[5], $row[6], $row[7], $row[8], $row[9], $row[10], $row[10]);
        }

        return $users;
    }

    public function updateUser($id, $colName, $newValue) {
        $newValue = '"' . $newValue . '"';
        $update = "UPDATE perfil SET $colName = $newValue WHERE id = $id";
        echo $update;

        $this->connection->prepare($update)->execute();
    }
}