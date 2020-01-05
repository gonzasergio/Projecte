<?php


class User {
    private $id;
    private $userName;
    private $name;
    private $surname1;
    private $surname2;
    private $dni;
    private $phoneNumber;
    private $email;
    private $city;
    private $lvl;
    private $pass;


    public function __construct($userName, $name, $surname1, $surname2, $dni, $phoneNumber, $email, $city, $lvl, $pass,$id = null) {
        $this->id = $id;
        $this->userName = $userName;
        $this->name = $name;
        $this->surname1 = $surname1;
        $this->surname2 = $surname2;
        $this->dni = $dni;
        $this->phoneNumber = $phoneNumber;
        $this->email = $email;
        $this->city = $city;
        $this->lvl = $lvl;
        $this->pass = $pass;
    }


    public function getId() {
        return $this->id;
    }
    public function getUserName() {
        return $this->userName;
    }

    public function getName() {
        return $this->name;
    }

    public function getSurname1() {
        return $this->surname1;
    }

    public function getSurname2() {
        return $this->surname2;
    }

    public function getDni() {
        return $this->dni;
    }

    public function getPhoneNumber() {
        return $this->phoneNumber;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getCity() {
        return $this->city;
    }

    public function getLvl() {
        return $this->lvl;
    }

    public function getPass() {
        return $this->pass;
    }

    public function setId($id): void {
        $this->id = $id;
    }

    public function toArray(){
        return [
            'id' => $this->id,
            'userName' => $this->userName,
            'name' => $this->name,
            'surname1' => $this->surname1,
            'surname2' => $this->surname2,
            'dni' => $this->dni,
            'phoneNumber' => $this->phoneNumber,
            'city' => $this->city,
            'lvl' => $this->lvl,
            'pass' => $this->pass
        ];
    }


}