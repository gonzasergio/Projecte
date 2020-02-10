<?php

interface DAO_Card {

    public function insert(Targeta $targeta);

    public function getCardById($id);

    public function deleteCardByNumber($number);

    public function getAllCards();

    public function updateCard($number, $colName, $newValue);
}