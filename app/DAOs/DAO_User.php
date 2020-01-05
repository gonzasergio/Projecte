<?php

interface DAO_User {

    public function insert(User $user);

    public function getUserById($id);

    public function deleteUserById($id);

    public function getAllUsers();

    public function updateUser($id, $colName, $newValue);

}