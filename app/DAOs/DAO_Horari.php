<?php

interface DAO_Horari {

    public function insert(Horari $horari);

    public function getHorariById($id);

    public function deleteHorariById($id);

    public function getAllHoraris();

    public function updateHorari($id, $colName, $newValue);
}