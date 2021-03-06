<?php

interface DAO_Excursio {

    public function insert(Excursio $excursio);

    public function getExcursioById($id);

    public function deleteExcursioById($id);

    public function getAllExcursions();

    public function getAllExcursionsByIdPropietari($id);

    public function updateExcursio($id, $colName, $newValue);

    public function getAllExcursionsByDistance($discande);

    public function getAllExcursionsByDifficulty($idDiff);

    public function getAllExcursionsByDuration($duration);

}