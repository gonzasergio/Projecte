<?php

class Grup extends Model {
    private $idPerfil;
    private $idExcursio;

    public function __construct($idPerfil, $idExcursio) {
        $this->idPerfil = $idPerfil;
        $this->idExcursio = $idExcursio;
    }

    public function getidExcursio() {
        return $this->idExcursio;
    }

    public function getIdPerfil() {
        return $this->idPerfil;
    }

    public function setidExcursio($idExcursio) {
        $this->idExcursio = $idExcursio;
    }

    public function setIdPerfil($idPerfil) {
        $this->idPerfil = $idPerfil;
    }

    public function toArray(){
        return [
            'idExcursio' => $this->idExcursio,
            'idPerfil' => $this->idPerfil
        ];
    }

}