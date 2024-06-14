<?php
include_once (__DIR__ . '/../Models/ComicsModel.php');

class AuthService
{
    private $userModel;

    public function __construct(UserModel $userModel)
    {
        $this->userModel = $userModel;
    }

    public function verifyCredentials($username, $password) {
        return $this->userModel->findUser($username, $password);
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
}
