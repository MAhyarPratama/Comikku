<?php
require_once __DIR__ . '/../models/UsersModel.php';

class UsersService {
    private $usersModel;

    public function __construct() {
        $this->usersModel = new UsersModel();
    }

    public function getAllUsers() {
        return $this->usersModel->getAllUsers();
    }

    public function createUser($data) {
        return $this->usersModel->createUser($data);
    }

    public function loginUser($data) {
        $user = $this->usersModel->checkCredentials($data);
        if ($user) {
            // Here you can generate a token or start a session
            return ["message" => "Login successful", "user" => $user];
        } else {
            return ["message" => "Invalid email or password"];
        }
    }
}
?>
