<?php


interface DAO_Promocio {

    public function insert(Promocio $promocio);

    public function getPromocioById($id);

    public function deletePromocioById($id);

    public function getAllPromocio();

    public function updatePromocio($id, $colName, $newValue);

}