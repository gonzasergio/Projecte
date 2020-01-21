<?php


class History extends Model {
    private $id;
    private $image;
    private $idUser;
    private $day;
    private $minut;

    /**
     * History constructor.
     * @param $id
     * @param $image
     * @param $id_user
     * @param $day
     * @param $minut
     */
    public function __construct($image, $idUser, $day, $minut, $id = null) {
        $this->id = $id;
        $this->image = $image;
        $this->idUser = $idUser;
        $this->day = $day;
        $this->minut = $minut;
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
    public function getImage() {
        return $this->image;
    }

    /**
     * @param mixed $image
     */
    public function setImage($image): void {
        $this->image = $image;
    }

    /**
     * @return mixed
     */
    public function getIdUser() {
        return $this->idUser;
    }

    /**
     * @param mixed $id_user
     */
    public function setIdUser($id_user): void {
        $this->idUser = $id_user;
    }

    /**
     * @return mixed
     */
    public function getDay() {
        return $this->day;
    }

    /**
     * @param mixed $day
     */
    public function setDay($day): void {
        $this->day = $day;
    }

    /**
     * @return mixed
     */
    public function getMinut() {
        return $this->minut;
    }

    /**
     * @param mixed $minut
     */
    public function setMinut($minut): void {
        $this->minut = $minut;
    }

    public function toArray() {
        return [
          'id' => $this->id,
          'image' => $this->image,
          'id_user' => $this->idUser,
          'day' => $this->day,
          'minute' => $this->minut
        ];
    }
}