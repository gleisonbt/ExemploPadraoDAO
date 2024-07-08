<?php

interface UserDao {
    public function getAllUsers(); // This should return an array of User objects
    public function getUser($id); // This should return a User object
    public function updateUser($user); // This should update a User object
    public function deleteUser($user); // This should delete a User object
}

?>
