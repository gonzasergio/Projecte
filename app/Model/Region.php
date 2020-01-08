<?php


class Region extends Model {
    private $id;
    private $name;
    private $countryId;

    public function __construct($name, $countryId, $id = null) {
        $this->id = $id;
        $this->name = $name;
        $this->countryId = $countryId;
    }

    public function getId() {
        return $this->id;
    }

    public function setId($id): void {
        $this->id = $id;
    }

    public function getName() {
        return $this->name;
    }

    public function setName($name): void {
        $this->name = $name;
    }

    public function getCountryId() {
        return $this->countryId;
    }

    public function setCountryId($countryId): void {
        $this->countryId = $countryId;
    }


    public function toArray() {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'countryId' => $this->countryId
        ];
    }
}