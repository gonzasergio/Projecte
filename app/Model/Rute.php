<?php

class Rute {
    private $id;
    private $zone;
    private $km;
    private $difficulty;
    private $name;
    private $userNom;

    public function __construct($id, $zone, $km, $difficulty, $name, $userNom) {
        $this->id = $id;
        $this->zone = $zone;
        $this->km = $km;
        $this->difficulty = $difficulty;
        $this->name = $name;
        $this->userNom = ucfirst(strtolower($userNom));
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

    public function getName() {
        return $this->name;
    }

    public function getUserNom() {
        return $this->userNom;
    }

}