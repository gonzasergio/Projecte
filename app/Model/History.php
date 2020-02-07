<?php


class History extends Model {
    private $id;
    private $image;
    private $idUser;
    private $day;
    private $hour;

    public function __construct($image, $idUser, $day = null, $hour = null, $id = null) {
        $this->id = $id;
        $this->image = $image;
        $this->idUser = $idUser;
        $this->day = $day;
        $this->hour = $hour;
    }

    public function getId() {
        return $this->id;
    }

    public function setId($id): void {
        $this->id = $id;
    }

    public function getImage() {
        return $this->image;
    }

    public function setImage($image): void {
        $this->image = $image;
    }

    public function getIdUser() {
        return $this->idUser;
    }

    public function setIdUser($id_user): void {
        $this->idUser = $id_user;
    }

    public function getDay() {
        return $this->day;
    }

    public function setDay($day): void {
        $this->day = $day;
    }

    public function getHour() {
        return $this->hour;
    }

    public function setHour($hour): void {
        $this->hour = $hour;
    }

    public function toArray() {
        return [
          'id' => $this->id,
          'image' => $this->image,
          'id_user' => $this->idUser,
          'day' => $this->day,
          'hour' => $this->hour
        ];
    }
}