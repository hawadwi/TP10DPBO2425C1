<?php
require_once 'models/User.php';

class UserViewModel
{
    private $user;

    public function __construct()
    {
        $this->user = new User();
    }

    public function getUserList()
    {
        return $this->user->getAll();
    }

    public function getUserById($id_user)
    {
        return $this->user->getById($id_user);
    }

    public function addUser($nama, $email)
    {
        return $this->user->create($nama, $email);
    }

    public function updateUser($id_user, $nama, $email)
    {
        return $this->user->update($id_user, $nama, $email);
    }

    public function deleteUser($id_user)
    {
        return $this->user->delete($id_user);
    }
}
