<?php


class Point extends Model {
    private $id;
    private $x;
    private $y;
    private $idZone;

    /**
     * Zone constructor.
     * @param $id
     * @param $x
     * @param $y
     * @param $idZone
     */
    public function __construct($x, $y, $idZone, $id = null) {
        $this->id = $id;
        $this->x = $x;
        $this->y = $y;
        $this->idZone = $idZone;
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
    public function setId($id) {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getX() {
        return $this->x;
    }

    /**
     * @param mixed $x
     */
    public function setX($x) {
        $this->x = $x;
    }

    /**
     * @return mixed
     */
    public function getY() {
        return $this->y;
    }

    /**
     * @param mixed $y
     */
    public function setY($y) {
        $this->y = $y;
    }

    /**
     * @return mixed
     */
    public function getIdZone() {
        return $this->idZone;
    }

    /**
     * @param mixed $idZone
     */
    public function setIdZone($idZone) {
        $this->idZone = $idZone;
    }



    public function toArray() {
        return [
            'id' => $this->id,
            'x' => $this->x,
            'y' => $this->y
        ];
    }
}