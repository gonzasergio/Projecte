<?php


class User extends Model {
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
    private $follows_num;
    private $followers_num;
    private $hasHitory = false;
    private $description;


    public static function contructor($userName, $name, $surname1, $surname2, $dni, $phoneNumber, $email, $city, $lvl, $pass, $description = null, $id = null) {
        $user = new User();

        $user->id = $id;
        $user->userName = $userName;
        $user->name = $name;
        $user->surname1 = $surname1;
        $user->surname2 = $surname2;
        $user->dni = $dni;
        $user->phoneNumber = $phoneNumber;
        $user->email = $email;
        $user->city = $city;
        $user->lvl = $lvl;
        $user->pass = $pass;
        $user->description = $description;

        return $user;
    }

    public static function basicConstructor($userName, $name, $surname1,$email, $pass) {
        $user = new User();

        $user->userName = $userName;
        $user->name = $name;
        $user->surname1 = $surname1;
        $user->email = $email;
        $user->pass = $pass;

        return $user;
    }

    /**
     * @return mixed
     */
    public function getDescription() {
        return $this->description;
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

    public function setUserName($userName): void {
        $this->userName = $userName;
    }

    public function setName($name): void {
        $this->name = $name;
    }

    public function setSurname1($surname1): void {
        $this->surname1 = $surname1;
    }

    public function setSurname2($surname2): void {
        $this->surname2 = $surname2;
    }

    public function setDni($dni): void {
        $this->dni = $dni;
    }

    public function setPhoneNumber($phoneNumber): void {
        $this->phoneNumber = $phoneNumber;
    }

    public function setEmail($email): void {
        $this->email = $email;
    }

    public function setCity($city): void {
        $this->city = $city;
    }

    public function setLvl($lvl): void {
        $this->lvl = $lvl;
    }


    public function setId($id): void {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getFollowsNum() {
        return $this->follows_num;
    }

    /**
     * @param mixed $follows_num
     */
    public function setFollowsNum($follows_num): void {
        $this->follows_num = $follows_num;
    }

    /**
     * @return mixed
     */
    public function getFollowersNum() {
        return $this->followers_num;
    }

    /**
     * @param mixed $followers_num
     */
    public function setFollowersNum($followers_num): void {
        $this->followers_num = $followers_num;
    }

    public function hasHitory(){
        $this->hasHitory = true;
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
            'pass' => $this->pass,
            'followers_num' => $this->followers_num,
            'follows_num' => $this->follows_num,
            'hasHistory' => $this->hasHitory,
            'description' => $this->description
        ];
    }


}