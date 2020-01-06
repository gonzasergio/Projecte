<?php

class PaypalDAO implements DAO_Paypal {
    use FormatSQL;
    private $connection;

    public function __construct() {
        $this->connection = DBConnection::getInstance('db_goatrails')->getConnection();
    }

    public function insert(Paypal $paypal) {
        $email = $this->packUp($paypal->getEmail());
        $idPerfil = $this->packUp($paypal->getIdPerfil());

        $insert = "INSERT INTO paypal
        (`email`,`id_perfil`)
        values ($email, $idPerfil)";

        $this->connection->prepare($insert)->execute();

    }

    public function getPaypalById($id) {
        $paypal = null;
        $select = "SELECT * FROM paypal WHERE email = $id";

        $stmt = $this->connection->prepare($select);
        $stmt->execute();

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $paypal = new Paypal($row[0], $row[1]);
        }

        return $paypal;

    }

    public function deletePaypalById($id) {
        $select = "DELETE FROM paypal WHERE email = $id";

        $stmt = $this->connection->prepare($select);
        $stmt->execute();
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
        $newValue = $this->packUp($newValue);
        $update = "UPDATE paypal SET $colName = $newValue WHERE email = $id";

        $this->connection->prepare($update)->execute();
    }
}