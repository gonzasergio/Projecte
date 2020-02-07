<?php

class GrupDAO implements DAO_Grup {
    use FormatSQL;
    private $connection;

    public function __construct() {
        $this->connection = DBConnection::getInstance('db_goatrails')->getConnection();
    }

    public function insert(Grup $grup) {
        $idExcursio = $grup->getidExcursio();
        $idPerfil = $grup->getIdPerfil();

        $insert = $this->
        connection->prepare("INSERT INTO grup
        (`id_perfil`,`id_excursio`)
        values (:idPerfil, :idExcursio)");

        $insert->bindParam(':idPerfil', $idPerfil);
        $insert->bindParam(':idExcursio', $idExcursio);

        $insert->execute();

    }

    public function getAllMembersByGrupId($id) {
        $grup = null;

        $select = $this->connection->prepare("SELECT id_perfil FROM grup WHERE id_excursio = :id");
        $select->bindParam(':id', $id);

        $select->execute();

        if ($row = $select->fetch(PDO::FETCH_NUM)) {
            $grup = new Grup($row[0]);
        }

        return $grup;

    }

    public function deleteGrupById($id) {
        $select = $this->connection->prepare("DELETE FROM grup WHERE id = :id");
        $select->bindParam(':id', $id);

        $select->execute();
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
        $update = $this->connection->prepare("UPDATE grup SET :colName = :newValue WHERE id = :id");
        $update->bindParam(':colName', $colName);
        $update->bindParam(':newValue', $newValue);
        $update->bindParam(':id', $id);

        $update->execute();
    }
}