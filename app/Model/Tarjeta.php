<?php

class Tarjeta extends Model {
    private $numero;
    private $nom;
    private $lli1;
    private $lli2;
    private $cvv;
    private $dataVenciment;
    private $idPerfil;

    public function __construct($numero, $nom, $lli1, $lli2, $cvv, $dataVenciment, $idPerfil) {
        $this->numero = $numero;
        $this->nom = $nom;
        $this->lli1 = $lli1;
        $this->lli2 = $lli2;
        $this->cvv = $cvv;
        $this->dataVenciment = $dataVenciment;
        $this->idPerfil = $idPerfil;
    }

    public function getNumero(){
        return $this->numero;
    }

    public function getNom(){
        return $this->nom;
    }

    public function getLli1(){
        return $this->lli1;
    }

    public function getLli2(){
        return $this->lli2;
    }

    public function getCvv(){
        return $this->cvv;
    }

    public function getDataVenciment(){
        return $this->dataVenciment;
    }

    public function getIdPerfil(){
        return $this->idPerfil;
    }


    public function setNumero($numero){
        $this->numero = $numero;
    }

    public function setNom($nom){
        $this->nom = $nom;
    }

    public function setLli1($lli1){
        $this->lli1 = $lli1;
    }

    public function setLli2($lli2){
        $this->lli2 = $lli2;
    }

    public function setCvv($cvv){
        $this->cvv = $cvv;
    }

    public function setDataVenciment($dataVenciment){
        $this->dataVenciment = $dataVenciment;
    }

    public function setIdPerfil($idPerfil){
        $this->idPerfil = $idPerfil;
    }


    public function toArray(){
        return [
            'numero' => $this->numero,
            'nom' => $this->nom,
            'lli1' => $this->lli1,
            'lli2' => $this->lli2,
            'cvv' => $this->cvv,
            'dataVenciment' => $this->dataVenciment,
            'idPerfil' => $this->idPerfil
        ];
    }

}