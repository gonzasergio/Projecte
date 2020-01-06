<?php

interface DAO_Grup {

    public function insert(Grup $grup);

    public function getAllMembersByGrupId($id);

    public function deleteGrupById($id);

    public function getAllGrups();

    public function updateGrup($idPerfil, $idExcursio, $colName, $newValue);
}