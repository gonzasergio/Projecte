<?php


class Excursio extends Model {
    private $id;
    //private $titol;
    private $distancia;
    private $id_dificultat;
    private $duracio;
    private $preu;
    private $maxim_persones;
    private $descripcio;
    private $id_propietari;


    public function __construct(/*$titol,*/ $distancia, $id_dificultat, $duracio, $preu, $maxim_persones, $descripcio, /*$id_propietari,*/ $id = null) {
        $this->id = $id;
        //$this->titol = $titol;
        $this->distancia = $distancia;
        $this->id_dificultat = $id_dificultat;
        $this->duracio = $duracio;
        $this->preu = $preu;
        $this->maxim_persones = $maxim_persones;
        $this->descripcio = $descripcio;
        //$this->id_propietari = $id_propietari;
    }


    public function getId() {
        return $this->id;
    }
    /*
    public function getTitol(){
        return $this->titol;
    }
    */
    public function getDistancia() {
        return $this->distancia;
    }

    public function getId_dificultat() {
        return $this->id_dificultat;
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

    public function getIdPropietari(){
        return $this->id_propietari;
    }

    public function setId($id): void {
        $this->id = $id;
    }
    
    public function setDistancia($distancia): void {
        $this->distancia = $distancia;
    }
    
    public function setId_dificultat($id_dificultat): void {
        $this->id_dificultat = $id_dificultat;
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

    public function setIdPropietari($id_propietari): void {
        $this->id_propietari = $id_propietari;
    }

    public function toArray(){
        return [
            'id' => $this->id,
            //'titol' => $this->titol,
            'distancia' => $this->distancia,
            'id_dificultat' => $this->id_dificultat,
            'duracio' => $this->duracio,
            'preu' => $this->preu,
            'maxim_persones' => $this->maxim_persones,
            'descripcio' => $this->descripcio,
            //'id_propietari' => $this->id_propietari
        ];
    }


}