<?php


class Country extends Model {
    private $id;
    private $name;

    public function __construct($name, $id = null) {
        $this->id = $id;
        $this->name = $name;
    }

    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function setId($id): void {
        $this->id = $id;
    }

    public function setNameArray($name): void {
        $this->name = $name;
    }


    public function toArray() {
        return [
            'id' => $this->id,
            'name' => $this->name
        ];
    }
}