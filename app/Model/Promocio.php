<?php


class Promocio extends Model {
    private $id;
    private $nom;
    private $preu;


    public function __construct($nom, $preu,$id = null) {
        $this->id = $id;
        $this->nom = $nom;
        $this->preu = $preu;
    }


    public function getId() {
        return $this->id;
    }
    public function getNom() {
        return $this->nom;
    }

    public function getPreu() {
        return $this->preu;
    }

    public function setId($id): void {
        $this->id = $id;
    }

    public function setNom($nom): void {
        $this->name = $nom;
    }

    public function setPreu($preu): void {
        $this->preu = $preu;
    }

    public function toArray(){
        return [
            'id' => $this->id,
            'nom' => $this->nom,
            'preu' => $this->preu,
        ];
    }


}