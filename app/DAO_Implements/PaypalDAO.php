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
        $paypals = [];

        $stmt = $this->connection->prepare("SELECT * FROM paypal WHERE id_perfil = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $paypals[] = new Paypal($row[1], $row[0]);
        }

        return $paypals;
    }

    public function deletePaypalByEmail($email) {
        $select = $this->connection->prepare("DELETE FROM paypal WHERE email = :email");
        $select->bindParam(':email', $email);

        $select->execute();
    }

    public function getAllPaypals() {
        $paypals = [];
        $select = "SELECT * FROM paypal";

        $stmt = $this->connection->prepare($select);
        $stmt->execute();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $paypals[] = new Paypal($row[1], $row[0]);
        }

        return $paypals;
    }

    public function updatePaypal($email, $colName, $newValue) {
        $update = $this->connection->prepare("UPDATE paypal SET :colName = :newValue WHERE email = :email");
        $update->bindParam(':colName', $colName);
        $update->bindParam(':newValue', $newValue);
        $update->bindParam(':email', $email);

        $update->execute();
    }
}