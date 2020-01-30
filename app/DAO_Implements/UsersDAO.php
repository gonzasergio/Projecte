<?php

class UsersDAO extends DAO implements DAO_User {
    use FormatSQL;
    protected $connection;

    public function __construct() {
        $this->connection = DBConnection::getInstance('db_goatrails')->getConnection();
    }

    public function insert(User $user) {
        $userName = $this->packUp($user->getUserName());
        $name = $this->packUp($user->getName());
        $surname1 = $this->packUp($user->getSurname1());
        $surname2 = $this->packUp($user->getSurname2());
        $dni = $this->packUp($user->getDni());
        $phoneNumber = $this->packUp($user->getPhoneNumber());
        $email = $this->packUp($user->getEmail());
        $city = $this->packUp($user->getCity());
        $lvl = $this->packUp($user->getLvl());
        $pass = $this->packUp($user->getPass());
        $description = $this->packUp($user->getDescription());

        $insert = "INSERT INTO perfil 
        (`nom`,`userName`,`llinatge1`,`llinatge2`,`dni`,`telefon`,`email`,`id_ciutat`,`id_nivell`,`pass`, `descripcio`)
        values ($userName, $name, $surname1, $surname2, $dni, $phoneNumber, $email, $city, $lvl, $pass, $description)";

        $this->executeQuery($insert)->execute();

    }

    public function getUserById($id) {
        $user = null;
        $select = "SELECT * FROM perfil WHERE id = $id";

        $stmt = $this->connection->prepare($select);
        $stmt->execute();

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $user = new User($row[1], $row[2], $row[3], $row[4], $row[5], $row[6], $row[7], $row[8], $row[9], $row[10], $row[11], $row[0]);
        }

        $select = "select seguir.num, seguidors.num
        from perfil, 
        (select count(*) as num from seguir where id_perfil = $id) as seguir,
        (select count(*) as num from seguir where id_perfil_seguit = $id) as seguidors
        where id = $id ";

        $stmt = $this->connection->prepare($select);
        $stmt->execute();

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $user->setFollowsNum($row[0]);
            $user->setFollowersNum($row[1]);
        }

        $select = "select count(historia.id) as num from historia where id_perfil_propietari = $id group by id_perfil_propietari ";

        $stmt = $this->connection->prepare($select);
        $stmt->execute();

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $user->hasHitory();
        }

        return $user;

    }

    public function deleteUserById($id) {
        $select = "DELETE FROM perfil WHERE id = $id";

        $stmt = $this->connection->prepare($select);
        $stmt->execute();
    }

    public function getAllUsers() {
        $users = [];
        $select = "SELECT * FROM perfil";

        $stmt = $this->connection->prepare($select);
        $stmt->execute();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $users[] = new User($row[1], $row[2], $row[3], $row[4], $row[5], $row[6], $row[7], $row[8], $row[9], $row[10], $row[11], $row[0]);
        }

        return $users;
    }

    public function updateUser($id, $colName, $newValue) {
        $newValue = $this->packUp($newValue);
        $update = "UPDATE perfil SET $colName = $newValue WHERE id = $id";

        $this->connection->prepare($update)->execute();
    }
}