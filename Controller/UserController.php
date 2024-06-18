<?php
include_once (__DIR__ . '/../Models/UserModel.php');
include_once (__DIR__ . '/../Services/UserService.php');

class UserController
{
    private $userService;
    private $userModel;
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
        $this->userModel = new UserModel($this->db);
        $this->userService = new UserService($this->userModel, $this->db);
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
        // Ensure $this->db is initialized and not null
        $this->userService = new UserService($this->userModel, $this->db);
        
        $data = json_decode(file_get_contents("php://input"), true);
    
        // Validasi input pengguna
        if (empty($data['username']) || empty($data['password'])) {
            http_response_code(400);
            echo json_encode(["message" => "Invalid input"]);
            return;
        }
    
        // Simpan password tanpa hashing
        $user_data = [
            'username' => $data['username'],
            'password' => $data['password'],
            'role' => 'user'  // Asumsi default role adalah 'user'
        ];

        if ($this->userService->addUser($user_data)) {
            http_response_code(201);
            echo json_encode(["message" => "User registered successfully"]);
        } else {
            http_response_code(500);
            echo json_encode(["message" => "Failed to register user"]);
        }
    }
    
    public function adminAddUser()
    {
        $data = json_decode(file_get_contents("php://input"), true); // Add comma
    
        // Validasi input pengguna
        if (empty($data['username']) || empty($data['password']) || empty($data['role']) || empty($data['email'])) {
            http_response_code(400);
            echo json_encode(["message" => "Invalid input"]);
            return;
        }
    
        // Simpan password tanpa hashing
        $user_data = [
            'username' => $data['username'],
            'password' => $data['password'],
            'email' => $data['email'],
            'role' => $data['role']
        ];
    
        if ($this->userService->addUser($user_data)) {
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
