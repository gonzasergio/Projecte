<?php

class PaypalDAO implements DAO_Paypal {
    use FormatSQL;
    private $connection;

    public function __construct() {
        $this->connection = DBConnection::getInstance('db_goatrails')->getConnection();
    }

    public function insert(Paypal $paypal) {
        $email = $paypal->getEmail();
        $idPerfil = $paypal->getIdPerfil();

        $insert = $this->
        connection->prepare("INSERT INTO paypal
        (`email`,`id_perfil`)
        values (:email, :idPerfil)");
        $insert->bindParam(':email', $email);
        $insert->bindParam(':idPerfil', $idPerfil);

        $insert->execute();

    }

    public function getPaypalById($id) {
        $paypal = null;

        $select = $this->connection->prepare("SELECT * FROM paypal WHERE id = :id");
        $select->bindParam(':id', $id);

        $select->execute();

        if ($row = $select->fetch(PDO::FETCH_NUM)) {
            $paypal = new Paypal($row[0], $row[1]);
        }

        return $paypal;

    }

    public function deletePaypalById($id) {
        $select = $this->connection->prepare("DELETE FROM paypal WHERE id = :id");
        $select->bindParam(':id', $id);

        $select->execute();
    }

    public function getAllPaypals() {
        $paypals = [];
        $select = "SELECT * FROM paypal";

        $stmt = $this->connection->prepare($select);
        $stmt->execute();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $paypals[] = new Paypal($row[0], $row[1]);
        }

        return $paypals;
    }

    public function updatePaypal($id, $colName, $newValue) {
        $update = $this->connection->prepare("UPDATE paypal SET :colName = :newValue WHERE id = :id");
        $update->bindParam(':colName', $colName);
        $update->bindParam(':newValue', $newValue);
        $update->bindParam(':id', $id);

        $update->execute();
    }
}