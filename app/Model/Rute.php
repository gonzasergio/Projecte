<?php

class Rute {
    private $id;
    private $zone;
    private $km;
    private $difficulty;

    public function __construct($id, $zone, $km, $difficulty) {
        $this->id = $id;
        $this->zone = $zone;
        $this->km = $km;
        $this->difficulty = $difficulty;
    }

    public function getId() {
        return $this->id;
    }

    public function getZone() {
        return $this->zone;
    }

    public function getKm() {
        return $this->km;
    }

    public function getDifficulty() {
        return $this->difficulty;
    }

}