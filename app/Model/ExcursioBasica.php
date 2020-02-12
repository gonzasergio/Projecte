<?php


class ExcursioBasica extends Excursio {
    private $propietari;

    public function __construct($titol, $distancia, $id_dificultat, $duracio, $maxim_persones, $descripcio, $propietari, $id = null) {
        $this->propietari = $propietari;
        parent::__construct($titol, $distancia, $id_dificultat, $duracio, $maxim_persones, $descripcio, $id);
    }

    /**
     * @return mixed
     */
    public function getPropietari() {
        return $this->propietari;
    }

    /**
     * @param mixed $propietari
     */
    public function setPropietari($propietari): void {
        $this->propietari = $propietari;
    }

    public function toArray() {
        $array = parent::toArray();

        $array['owner'] = $this->propietari;

        return$array;
    }
}