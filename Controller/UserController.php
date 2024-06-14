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

    public function registerUser()
    {
        $data = json_decode(file_get_contents("php://input"), true);

        // Validate user input
        if (empty($data['username']) || empty($data['password'])) {
            http_response_code(400);
            echo json_encode(["message" => "Invalid input"]);
            return;
        }

        if ($this->userService->addUser(['username' => $data['username'], 'password' => $data['password'], 'role' => 'user'])) {
            http_response_code(201);
            echo json_encode(["message" => "User registered successfully"]);
        } else {
            http_response_code(500);
            echo json_encode(["message" => "Failed to register user"]);
        }
    }

    public function adminAddUser()
    {
        $data = json_decode(file_get_contents("php://input"), true);

        // Validate user input
        if (empty($data['username']) || empty($data['password']) || empty($data['role'])) {
            http_response_code(400);
            echo json_encode(["message" => "Invalid input"]);
            return;
        }

        if ($this->userService->addUser($data)) {
            http_response_code(201);
            echo json_encode(["message" => "User created successfully"]);
        } else {
            http_response_code(500);
            echo json_encode(["message" => "Failed to create user"]);
        }
    }

    public function adminDeleteUser($id)
    {
        if ($this->userService->deleteUser($id)) {
            http_response_code(200);
            echo json_encode(["message" => "User deleted successfully"]);
        } else {
            http_response_code(500);
            echo json_encode(["message" => "Failed to delete user"]);
        }
    }
}
