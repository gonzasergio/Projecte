<?php

class Paypal extends Model {
    private $idPerfil;
    private $email;

    public function __construct($idPerfil, $email) {
        $this->idPerfil = $idPerfil;
        $this->email = $email;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getIdPerfil() {
        return $this->idPerfil;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setIdPerfil($idPerfil) {
        $this->idPerfil = $idPerfil;
    }

    public function toArray(){
        return [
            'email' => $this->email,
            'idPerfil' => $this->idPerfil
        ];
    }

}