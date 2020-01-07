<?php

class GrupDAO implements DAO_Grup {
    use FormatSQL;
    private $connection;

    public function __construct() {
        $this->connection = DBConnection::getInstance('db_goatrails')->getConnection();
    }

    public function insert(Grup $grup) {
        $idExcursio = $this->packUp($grup->getidExcursio());
        $idPerfil = $this->packUp($grup->getIdPerfil());

        $insert = "INSERT INTO grup
        (`id_perfil`,`id_excursio`)
        values ($idPerfil, $idExcursio)";

        $this->connection->prepare($insert)->execute();

    }

    public function getAllMembersByGrupId($id) {
        $grup = null;
        $select = "SELECT id_perfil FROM grup WHERE id_excursio = $id";

        $stmt = $this->connection->prepare($select);
        $stmt->execute();

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $grup = new Grup($row[0]);
        }

        return $grup;

    }

    public function deleteGrupById($id) {
        $select = "DELETE FROM grup WHERE id_excursio = $id";

        $stmt = $this->connection->prepare($select);
        $stmt->execute();
    }

    public function getAllGrups() {
        $grups = [];
        $select = "SELECT DISTINCT id_excursio FROM grup";

        $stmt = $this->connection->prepare($select);
        $stmt->execute();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $grups[] = new Grup($row[0]);
        }

        return $grups;
    }

    public function updateGrup($idPerfil, $idExcursio, $colName, $newValue) {
        $newValue = $this->packUp($newValue);
        $update = "UPDATE grup SET $colName = $newValue WHERE id_perfil = $idPerfil and id_excursio = $idExcursio";

        $this->connection->prepare($update)->execute();
    }
}