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
        $user = $this->userModel->getUserByUsername($username);
        var_dump($password); // Tambahkan untuk melihat password yang diberikan
        var_dump($user['Password']); // Tambahkan untuk melihat password dari database
    
        if ($user && $password === $user['Password']) {
            return $user;
        }
        return false;
    } 
    
    public function authenticate($username, $password)
    {
        $user = $this->userModel->getUserByUsername($username);
        if ($user && $password === $user['password']) {
            return true;
        }
        return false;
    }
    
    public function getUserByUsername($username)
    {
        return $this->userModel->getUserByUsername($username);
    }
}
