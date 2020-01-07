<?php


class Curs extends Model {
    private $id;
    private $duracio;
    private $preu;
    private $maxim_persones;
    private $descripcio;
    private $id_promocio;
    private $id_dificultat;


    public function __construct($duracio, $preu, $maxim_persones, $descripcio, $id_promocio, $id_dificultat,$id = null) {
        $this->id = $id;
        $this->duracio = $duracio;
        $this->preu = $preu;
        $this->maxim_persones = $maxim_persones;
        $this->descripcio = $descripcio;
        $this->id_promocio = $id_promocio;
        $this->id_dificultat = $id_dificultat;
    }


    public function getId() {
        return $this->id;
    }
    
    public function getDuracio() {
        return $this->duracio;
    }
    
    public function getPreu() {
        return $this->preu;
    }
    
    public function getMaxim_persones() {
        return $this->maxim_persones;
    }
    
    public function getDescripcio() {
        return $this->descripcio;
    }
    
    public function getId_promocio() {
        return $this->id_promocio;
    }

    public function getId_dificultat() {
        return $this->id_dificultat;
    }

    public function setId($id): void {
        $this->id = $id;
    }
    
    public function setDuracio($duracio): void {
        $this->duracio = $duracio;
    }
    
    public function setPreu($preu): void {
        $this->preu = $preu;
    }
    
    public function setMaxim_persones($maxim_persones): void {
        $this->maxim_persones = $maxim_persones;
    }
    
    public function setDescripcio($descripcio): void {
        $this->descripcio = $descripcio;
    }
    
    public function setId_promocio($id_promocio): void {
        $this->id_promocio = $id_promocio;
    }
    
    public function setId_dificultat($id_dificultat): void {
        $this->id_dificultat = $id_dificultat;
    }

    public function toArray(){
        return [
            'id' => $this->id,
            'duracio' => $this->duracio,
            'preu' => $this->preu,
            'maxim_persones' => $this->maxim_persones,
            'descripcio' => $this->descripcio,
            'id_promocio' => $this->id_promocio,
            'id_dificultat' => $this->id_dificultat
        ];
    }


}