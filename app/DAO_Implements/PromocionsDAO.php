<?php

class PromocionsDAO implements DAO_User {
    use FormatSQL;
    private $connection;

    public function __construct() {
        $this->connection = DBConnection::getInstance('db_goatrails')->getConnection();
    }

    public function insert(User $user) {
        $userName = $this->packUp($user->getUserName());
        $name = $this->packUp($user->getName());

        $insert = "INSERT INTO promocio 
        (`nom`,`preu`)
        values ($nom, $preu)";

        $this->connection->prepare($insert)->execute();

    }

    public function getPromocioById($id) {
        $promocio = null;
        $select = "SELECT * FROM promocio WHERE id = $id";

        $stmt = $this->connection->prepare($select);
        $stmt->execute();

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $promocio = new Promocio($row[1], $row[2], $row[0]);
        }

        return $promocio;

    }

    public function deletePromocioById($id) {
        $select = "DELETE FROM promocio WHERE id = $id";

        $stmt = $this->connection->prepare($select);
        $stmt->execute();
    }

    public function getAllPromocions() {
        $promocions = [];
        $select = "SELECT * FROM promocio";

        $stmt = $this->connection->prepare($select);
        $stmt->execute();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $promocions[] = new Promocio($row[1], $row[2], $row[0]);
        }

        return $promocions;
    }

    public function updatePromocio($id, $colName, $newValue) {
        $newValue = $this->packUp($newValue);
        $update = "UPDATE promocio SET $colName = $newValue WHERE id = $id";

        $this->connection->prepare($update)->execute();
    }
}