<?php


class Excursio extends Model {
    private $id;
    private $titol;
    private $distancia;
    private $id_dificultat;
    private $duracio;
    private $maxim_persones;
    private $descripcio;

    /**
     * Excursio constructor.
     * @param $id
     * @param $titol
     * @param $distancia
     * @param $id_dificultat
     * @param $duracio
     * @param $maxim_persones
     * @param $descripcio
     * @param $id_propietari
     */
    public function __construct($titol, $distancia, $id_dificultat, $duracio, $maxim_persones, $descripcio, $id = null) {
        $this->id = $id;
        $this->titol = $titol;
        $this->distancia = $distancia;
        $this->id_dificultat = $id_dificultat;
        $this->duracio = $duracio;
        $this->maxim_persones = $maxim_persones;
        $this->descripcio = $descripcio;
    }

    /**
     * @return null
     */
    public function getId() {
        return $this->id;
    }

    /**
     * @param null $id
     */
    public function setId($id): void {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getTitol() {
        return $this->titol;
    }

    /**
     * @param mixed $titol
     */
    public function setTitol($titol): void {
        $this->titol = $titol;
    }

    /**
     * @return mixed
     */
    public function getDistancia() {
        return $this->distancia;
    }

    /**
     * @param mixed $distancia
     */
    public function setDistancia($distancia): void {
        $this->distancia = $distancia;
    }

    /**
     * @return mixed
     */
    public function getIdDificultat() {
        return $this->id_dificultat;
    }

    /**
     * @param mixed $id_dificultat
     */
    public function setIdDificultat($id_dificultat): void {
        $this->id_dificultat = $id_dificultat;
    }

    /**
     * @return mixed
     */
    public function getDuracio() {
        return $this->duracio;
    }

    /**
     * @param mixed $duracio
     */
    public function setDuracio($duracio): void {
        $this->duracio = $duracio;
    }

    /**
     * @return mixed
     */
    public function getMaximPersones() {
        return $this->maxim_persones;
    }

    /**
     * @param mixed $maxim_persones
     */
    public function setMaximPersones($maxim_persones): void {
        $this->maxim_persones = $maxim_persones;
    }

    /**
     * @return mixed
     */
    public function getDescripcio() {
        return $this->descripcio;
    }

    /**
     * @param mixed $descripcio
     */
    public function setDescripcio($descripcio): void {
        $this->descripcio = $descripcio;
    }



    public function toArray(){
        return [
            'id' => $this->id,
            'titol' => $this->titol,
            'distancia' => $this->distancia,
            'id_dificultat' => $this->id_dificultat,
            'duracio' => $this->duracio,
            'maxim_persones' => $this->maxim_persones,
            'descripcio' => $this->descripcio
        ];
    }


}