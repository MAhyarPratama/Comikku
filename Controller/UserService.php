<?php
include_once (__DIR__ . '/../Models/UserModel.php');

class UserService
{
    private $userModel;

    public function __construct(UserModel $userModel)
    {
        $this->userModel = $userModel;
    }

    public function authenticate($username, $password)
    {
        $user = $this->userModel->getUserByUsername($username);
        if ($user && $user['PasswordHash'] === md5($password))
        {
            return true;
        }
        return false;
    }

    public function getUserByUsername($username)
    {
        return $this->userModel->getUserByUsername($username);
    }

    public function getAllUsers()
    {
        return $this->userModel->getAllUsers();
    }

    public function getUsersByRole($role)
    {
        return $this->userModel->getUsersByRole($role);
    }
}