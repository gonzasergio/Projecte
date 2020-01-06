<?php

interface DAO_Paypal {

    public function insert(Paypal $paypal);

    public function getPaypalById($id);

    public function deletePaypalById($id);

    public function getAllPaypals();

    public function updatePaypal($id, $colName, $newValue);
}