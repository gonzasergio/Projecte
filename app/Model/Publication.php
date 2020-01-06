<?php


class Publication extends Model {

    private $id;
    private $img;
    private $text;
    private $user;
    private $route;

    public function __construct($img, $text, $user, $route, $id = null) {
        $this->id = $id;
        $this->img = $img;
        $this->text = $text;
        $this->user = $user;
        $this->route = $route;
    }

    public function getId() {
        return $this->id;
    }

    public function getImg() {
        return $this->img;
    }

    public function getText() {
        return $this->text;
    }

    public function getUser() {
        return $this->user;
    }

    public function getRoute() {
        return $this->route;
    }

    public function setImg($img): void {
        $this->img = $img;
    }

    public function setText($text): void {
        $this->text = $text;
    }

    public function setUser($user): void {
        $this->user = $user;
    }

    public function setRoute($Route): void {
        $this->Route = $Route;
    }

    public function toArray() {
        return [
            'id' => $this->id,
            'img' => $this->img,
            'text' => $this->text,
            'user' => $this->user,
            'route' => $this->route,
        ];
    }
}