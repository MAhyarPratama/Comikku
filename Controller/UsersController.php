<?php
require_once __DIR__ . '/../models/UsersModel.php';
require_once __DIR__ . '/../services/UsersService.php';

class UsersController {
    private $userService;

    public function __construct() {
        $this->userService = new UsersService();
    }

    public function getUsers() {
        return $this->userService->getAllUsers();
    }

    public function createUser($data) {
        return $this->userService->createUser($data);
    }

    public function loginUser($data) {
        return $this->userService->loginUser($data);
    }
}
?>
