<?php

interface DAO_Modalitat {

    public function insert(Modalitat $modalitat);

    public function getModalitatById($id);

    public function deleteModalitatById($id);

    public function getAllModalitats();

    public function updateModalitat($id, $colName, $newValue);
}