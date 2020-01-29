<?php


class Curs extends Model {
    private $id;
    private $titol;
    private $duracio;
    private $id_dificultat;
    private $preu;
    private $maxim_persones;
    private $descripcio;
    private $id_ciutat;
    private $id_propietari;


    public function __construct($titol, $duracio, $id_dificultat, $preu, $maxim_persones, $descripcio, $id_ciutat, $id_propietari, $id = null) {
        $this->id = $id;
        $this->titol = $titol;
        $this->duracio = $duracio;
        $this->id_dificultat = $id_dificultat;
        $this->preu = $preu;
        $this->maxim_persones = $maxim_persones;
        $this->descripcio = $descripcio;
        $this->id_ciutat = $id_ciutat;
        $this->id_propietari = $id_propietari;
    }


    public function getId() {
        return $this->id;
    }

    public function getTitol(){
        return $this->titol;
    }
    
    public function getDuracio() {
        return $this->duracio;
    }

    public function getId_dificultat() {
        return $this->id_dificultat;
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

    public function getIdCiutat(){
        return $this->id_ciutat;
    }

    public function getIdPropietari(){
        return $this->id_propietari;
    }

    public function setId($id): void {
        $this->id = $id;
    }

    public function setTitol($titol): void {
        $this->titol = $titol;
    }
    
    public function setDuracio($duracio): void {
        $this->duracio = $duracio;
    }

    public function setId_dificultat($id_dificultat): void {
        $this->id_dificultat = $id_dificultat;
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

    public function setIdCiutat($id_ciutat): void {
        $this->id_ciutat = $id_ciutat;
    }

    public function setIdPropietari($id_propietari){
        $this->id_propietari = $id_propietari;
    }

    public function toArray(){
        return [
            'id' => $this->id,
            'titol' => $this->titol,
            'duracio' => $this->duracio,
            'id_dificultat' => $this->id_dificultat,
            'preu' => $this->preu,
            'maxim_persones' => $this->maxim_persones,
            'descripcio' => $this->descripcio,
            'id_ciutat' => $this->id_ciutat,
            'id_propietari' => $this->id_propietari
        ];
    }


}