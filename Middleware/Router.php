<?php
require_once __DIR__ . '/../controllers/UsersController.php';

class Router {
    private $usersController;

    public function __construct() {
        $this->usersController = new UsersController();
    }

    public function route($method, $urlList, $requestData) {
        if ($method == 'GET' && $urlList[0] == 'users') {
            echo json_encode($this->usersController->getUsers());
        } elseif ($method == 'POST' && $urlList[0] == 'users') {
            echo json_encode($this->usersController->createUser($requestData));
        } elseif ($method == 'POST' && $urlList[0] == 'login') {
            echo json_encode($this->usersController->loginUser($requestData));
        } else {
            echo json_encode(["message" => "Route not found"]);
        }
    }
}
?>
