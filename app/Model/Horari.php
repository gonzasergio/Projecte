<?php

class Horari extends Model {
    private $id;
    private $hora;
    private $minut;

    public function __construct($idPerfil, $email) {
        $this->id = $id;
        $this->hora = $hora;
        $this->minut = $minut;
    }

    public function getId() {
        return $this->id;
    }

    public function getHora() {
        return $this->hora;
    }

    public function getMinut() {
        return $this->minut;
    }

    public function setId($id) {
        $this->id = $id;
    }
    
    public function setHora($hora) {
        $this->hora = $hora;
    }
    
    public function setMinut($minut) {
        $this->minut = $minut;
    }

    public function toArray(){
        return [
            'id' => $this->email,
            'hora' => $this->hora,
            'minut' => $this->minut,
        ];
    }

}