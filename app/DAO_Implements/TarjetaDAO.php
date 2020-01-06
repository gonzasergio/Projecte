<?php

class TarjetaDAO implements DAO_Targeta {
    use FormatSQL;
    private $connection;

    public function __construct() {
        $this->connection = DBConnection::getInstance('db_goatrails')->getConnection();
    }

    public function insert(Targeta $targeta) {
        $numero = $this->packUp($targeta->getNumero());
        $nom = $this->packUp($targeta->getNom());
        $lli1 = $this->packUp($targeta->getLli1());
        $lli2 = $this->packUp($targeta->getLli2());
        $cvv = $this->packUp($targeta->getCvv());
        $dataVenciment = $this->packUp($targeta->getDataVenciment());
        $idPerfil = $this->packUp($targeta->getIdPerfil());

        $insert = "INSERT INTO tarjeta
        (`numero`,`nom`,`llinatje1`,`llinatje2`,`cvv`,`data_expirament`,`id_perfil`)
        values ($numero, $nom, $lli1, $lli2, $cvv, $dataVenciment, $idPerfil)";

        $this->connection->prepare($insert)->execute();

    }

    public function getTargetaById($id) {
        $targeta = null;
        $select = "SELECT * FROM tarjeta WHERE numero = $id";

        $stmt = $this->connection->prepare($select);
        $stmt->execute();

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $targeta = new Targeta($row[0], $row[1], $row[2], $row[3], $row[4], $row[5], $row[6], $row[7]);
        }

        return $targeta;

    }

    public function deleteTargetaById($id) {
        $select = "DELETE FROM tarjeta WHERE numero = $id";

        $stmt = $this->connection->prepare($select);
        $stmt->execute();
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
        $newValue = $this->packUp($newValue);
        $update = "UPDATE tarjeta SET $colName = $newValue WHERE numero = $id";

        $this->connection->prepare($update)->execute();
    }
}