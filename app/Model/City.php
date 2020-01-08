<?php


class City extends Model {
    private $id;
    private $name;
    private $regionId;

    public function __construct($name, $regionId, $id = null ) {
        $this->id = $id;
        $this->name = $name;
        $this->regionId = $regionId;
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

    public function getRegionId() {
        return $this->regionId;
    }

    public function setRegionId($regionId): void {
        $this->regionId = $regionId;
    }


    public function toArray() {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'regionId' => $this->regionId
        ];
    }
}