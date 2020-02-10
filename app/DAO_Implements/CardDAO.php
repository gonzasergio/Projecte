<?php

class CardDAO implements DAO_Card {
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

    public function getCardById($id) {
        $targeta = null;
        $select = $this->connection->prepare("SELECT * FROM tarjeta WHERE id_perfil = :id");
        $select->bindParam(':id', $id);

        $select->execute();

        if ($row = $select->fetch(PDO::FETCH_NUM)) {
            $targeta = new Card($row[0], $row[1], $row[2], $row[3], $row[4], $row[5], $row[6]);
        }

        return $targeta;

    }

    public function deleteCardByNumber($number) {
        $select = $this->connection->prepare("DELETE FROM tarjeta WHERE numero = :number");
        $select->bindParam(':number', $number);

        $select->execute();
    }

    public function getAllCards() {
        $targetes = [];
        $select = "SELECT * FROM tarjeta";

        $stmt = $this->connection->prepare($select);
        $stmt->execute();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $targetes[] = new Card($row[0], $row[1], $row[2], $row[3], $row[4], $row[5], $row[6]);
        }

        return $targetes;
    }

    public function updateCard($number, $colName, $newValue) {
        $update = $this->connection->prepare("UPDATE tarjeta SET :colName = :newValue WHERE numero = :number");
        $update->bindParam(':colName', $colName);
        $update->bindParam(':newValue', $newValue);
        $update->bindParam(':number', $number);

        $update->execute();
    }
}