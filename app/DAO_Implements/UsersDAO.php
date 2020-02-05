<?php

class UsersDAO extends DAO implements DAO_User {
    use FormatSQL;
    protected $connection;

    public function __construct() {
        $this->connection = DBConnection::getInstance('db_goatrails')->getConnection();
    }

    public function insert(User $user) {
        $userName = $user->getUserName();
        $name = $user->getName();
        $surname1 = $user->getSurname1();
        $email = $user->getEmail();
        $pass = $user->getPass();


        $insert = $this->
        connection->prepare("INSERT INTO perfil 
        (`nom`,`userName`,`llinatge1`,`email`,`pass`, `id_nivell`)
        values (:name, :userName, :surname1, :email, :pass, 1)");

        $insert->bindParam(':name', $name);
        $insert->bindParam(':userName', $userName);
        $insert->bindParam(':surname1', $surname1);
        $insert->bindParam(':email', $email);
        $insert->bindParam(':pass', $pass);

        $insert->execute();

    }

    public function getUserById($id) {
        $user = null;
        $select = $this->connection->prepare("SELECT * FROM perfil WHERE id = :id");
        $select->bindParam(':id', $id);

        $select->execute();

        if ($row = $select->fetch(PDO::FETCH_NUM)) {
            $user = User::contructor($row[1], $row[2], $row[3], $row[4], $row[5], $row[6], $row[7], $row[8], $row[9], $row[10], $row[11], $row[0]);
        }

        $selectFollow = $this->connection->prepare("select seguir.num, seguidors.num
        from perfil, 
        (select count(*) as num from seguir where id_perfil = :id) as seguir,
        (select count(*) as num from seguir where id_perfil_seguit = :id) as seguidors
        where id = :id");
        $selectFollow->bindParam(':id', $id);

        $selectFollow->execute();

        if ($row = $selectFollow->fetch(PDO::FETCH_NUM)) {
            $user->setFollowsNum($row[0]);
            $user->setFollowersNum($row[1]);
        }

        $selectHistory = $this->connection->prepare("select count(historia.id) as num from historia 
        where id_perfil_propietari = :id group by id_perfil_propietari ");
        $selectHistory->bindParam(':id', $id);

        $selectHistory->execute();

        if ($row = $selectHistory->fetch(PDO::FETCH_NUM)) {
            $user->hasHitory();
        }

        return $user;

    }

    public function deleteUserById($id) {
        $select = $this->connection->prepare("DELETE FROM perfil WHERE id = :id");
        $select->bindParam(':id', $id);

        $select->execute();
    }

    public function getAllUsers() {
        $users = [];
        $select = "SELECT * FROM perfil";

        $stmt = $this->connection->prepare($select);
        $stmt->execute();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $id = $row[0];
            $user = User::contructor($row[1], $row[2], $row[3], $row[4], $row[5], $row[6], $row[7], $row[8], $row[9], $row[10], $row[11], $row[0]);

            $selectFollow = $this->connection->prepare("select seguir.num, seguidors.num
            from perfil, 
            (select count(*) as num from seguir where id_perfil = :id) as seguir,
            (select count(*) as num from seguir where id_perfil_seguit = :id) as seguidors
            where id = :id");
            $selectFollow->bindParam(':id', $id);

            $selectFollow->execute();

            if ($row = $selectFollow->fetch(PDO::FETCH_NUM)) {
                $user->setFollowsNum($row[0]);
                $user->setFollowersNum($row[1]);
            }

            $selectHistory = $this->connection->prepare("select count(historia.id) as num from historia 
            where id_perfil_propietari = :id group by id_perfil_propietari ");
            $selectHistory->bindParam(':id', $id);

            $selectHistory->execute();

            if ($row = $selectHistory->fetch(PDO::FETCH_NUM)) {
                $user->hasHitory();
            }

            $users[] = $user;
        }

        return $users;
    }

    public function updateUser($id, $colName, $newValue) {
        $update = $this->connection->prepare("UPDATE perfil SET :colName = :newValue WHERE id = :id");
        $update->bindParam(':colName', $colName);
        $update->bindParam(':newValue', $newValue);
        $update->bindParam(':id', $id);

        $update->execute();
    }

    public function compUserCredentials($userName, $pass) {
        $row = null;

        $select = $this->connection->prepare("select pass, id from perfil where userName = :userName");
        $select->bindParam(':userName', $userName);

        $select->execute();

        if ($row = $select->fetch(PDO::FETCH_NUM))
            if($row[0] == $pass)
                return $row[1];


        return null;
    }
}