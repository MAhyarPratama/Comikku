<?php
include_once (__DIR__ . '/../Models/UserModel.php');
include_once (__DIR__ . '/../Services/UserService.php');

class UserController
{
    private $userService;

    public function __construct($db)
    {
        $userModel = new UserModel($db);
        $this->userService = new UserService($userModel);
    }

    public function getAllUsers()
    {
        $users = $this->userService->getAllUsers();
        $this->sendOutput(json_encode($users, JSON_PRETTY_PRINT));
    }

    public function getUsersByRole($role)
    {
        $users = $this->userService->getUsersByRole($role);
        $this->sendOutput(json_encode($users, JSON_PRETTY_PRINT));
    }

    private function sendOutput($data, $statusCode = 200)
    {
        header("Content-Type: application/json");
        http_response_code($statusCode);
        echo $data;
    }
}