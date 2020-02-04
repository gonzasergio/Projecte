<?php

class TarjetaDAO implements DAO_Targeta {
    use FormatSQL;
    private $connection;

    public function __construct() {
        $this->connection = DBConnection::getInstance('db_goatrails')->getConnection();
    }

    public function insert(Targeta $targeta) {
        $numero = $targeta->getNumero();
        $nom = $targeta->getNom();
        $lli1 = $targeta->getLli1();
        $lli2 = $targeta->getLli2();
        $cvv = $targeta->getCvv();
        $dataVenciment = $targeta->getDataVenciment();
        $idPerfil = $targeta->getIdPerfil();

        $insert = $this->
        connection->prepare("INSERT INTO tarjeta
        (`numero`,`nom`,`llinatje1`,`llinatje2`,`cvv`,`data_expirament`,`id_perfil`)
        values (:numero, :nom, :lli1, :lli2, :cvv, :dataVenciment, :idPerfil)");

        $insert->bindParam(':numero', $numero);
        $insert->bindParam(':nom', $nom);
        $insert->bindParam(':lli1', $lli1);
        $insert->bindParam(':lli2', $lli2);
        $insert->bindParam(':cvv', $cvv);
        $insert->bindParam(':dataVenciment', $dataVenciment);
        $insert->bindParam(':idPerfil', $idPerfil);

        $insert->execute();

    }

    public function getTargetaById($id) {
        $targeta = null;
        $select = $this->connection->prepare("SELECT * FROM tarjeta WHERE id = :id");
        $select->bindParam(':id', $id);

        $select->execute();

        if ($row = $select->fetch(PDO::FETCH_NUM)) {
            $targeta = new Targeta($row[0], $row[1], $row[2], $row[3], $row[4], $row[5], $row[6], $row[7]);
        }

        return $targeta;

    }

    public function deleteTargetaById($id) {
        $select = $this->connection->prepare("DELETE FROM tarjeta WHERE id = :id");
        $select->bindParam(':id', $id);

        $select->execute();
    }

    public function getAllTargetes() {
        $targetes = [];
        $select = "SELECT * FROM tarjeta";

        $stmt = $this->connection->prepare($select);
        $stmt->execute();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $targetes[] = new Targeta($row[0], $row[1], $row[2], $row[3], $row[4], $row[5], $row[6], $row[7]);
        }

        return $targetes;
    }

    public function updateTargeta($id, $colName, $newValue) {
        $update = $this->connection->prepare("UPDATE tarjeta SET :colName = :newValue WHERE id = :id");
        $update->bindParam(':colName', $colName);
        $update->bindParam(':newValue', $newValue);
        $update->bindParam(':id', $id);

        $update->execute();
    }
}