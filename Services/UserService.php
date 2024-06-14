<?php
class UserService
{
    private $userModel;

    public function __construct($userModel)
    {
        $this->userModel = $userModel;
    }

    public function getAllUsers()
    {
        return $this->userModel->getAllUsers();
    }

    public function getUsersByRole($role)
    {
        return $this->userModel->getUsersByRole($role);
    }

    public function addUser($user)
    {
        // Hash the password before storing it
        $user['password'] = password_hash($user['password'], PASSWORD_BCRYPT);
        return $this->userModel->addUser($user);
    }

    public function deleteUser($id)
    {
        return $this->userModel->deleteUser($id);
    }
}
