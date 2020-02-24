<?php

interface DAO_User {

    public function insert(User $user);

    public function getUserByUsername($id);

    public function deleteUserById($id);

    public function getAllUsers();

    public function updateUser($id, $colName, $newValue);

    public function compUserCredentials($userName, $pass);

}