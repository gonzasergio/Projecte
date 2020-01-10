<?php

interface DAO_Curs {

    public function insert(Curs $curs);

    public function getCursById($id);

    public function deleteCursById($id);

    public function getAllCursos();

    public function getAllCursosByIdPropietari($id);

    public function updateCurs($id, $colName, $newValue);

}