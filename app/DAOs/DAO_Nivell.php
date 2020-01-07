<?php

interface DAO_Nivell {

    public function insert(Nivell $nivell);

    public function getNivellById($id);

    public function deleteNivellById($id);

    public function getAllNivells();

    public function updateNivell($id, $colName, $newValue);
}