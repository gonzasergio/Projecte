<?php

interface DAO_Paypal {

    public function insert(Paypal $paypal);

    public function getPaypalById($id);

    public function deletePaypalByEmail($email);

    public function getAllPaypals();

    public function updatePaypal($email, $colName, $newValue);
}