<?php


class ExcursioEmpresa extends Excursio {
    private $price;
    private $instructior;


    public function __construct($titol, $distancia, $id_dificultat, $duracio, $maxim_persones, $descripcio, $price, $instructior, $id = null) {
        $this->price = $price;
        $this->instructior = $instructior;
        parent::__construct($titol, $distancia, $id_dificultat, $duracio, $maxim_persones, $descripcio, $id);
    }

    /**
     * @return mixed
     */
    public function getPrice() {
        return $this->price;
    }

    /**
     * @param mixed $price
     */
    public function setPrice($price): void {
        $this->price = $price;
    }

    /**
     * @return mixed
     */
    public function getInstructior() {
        return $this->instructior;
    }

    /**
     * @param mixed $instructior
     */
    public function setInstructior($instructior): void {
        $this->instructior = $instructior;
    }

    public function toArray(){
        $array = parent::toArray();

        $array['instructor'] = $this->instructior;
        $array['price'] = $this->price;

        return $array;
    }

}