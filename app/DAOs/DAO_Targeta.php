<?php

interface DAO_Targeta {

    public function insert(Targeta $targeta);

    public function getTargetaById($id);

    public function deleteTargetaById($id);

    public function getAllTargetes();

    public function updateTargeta($id, $colName, $newValue);
}