<?php
include_once (__DIR__ . '/../Models/UserModel.php');
include_once (__DIR__ . '/../Services/AuthService.php');

class AuthController
{
    private $authService;

    public function __construct($db)
    {
        $userModel = new UserModel($db);
        $this->authService = new AuthService($userModel);
    }

    public function login()
    {
        $data = json_decode(file_get_contents("php://input"), true);
        $username = $data['username'] ?? null;
        $password = $data['password'] ?? null;

        var_dump($username);
        var_dump($password);

        // Memeriksa apakah username atau password tidak disediakan
        if (is_null($username) || is_null($password)) {
            $response = [
                'success' => false,
                'message' => 'Username and password are required'
            ];
            header('Content-Type: application/json');
            echo json_encode($response);
            return;
        }

        $user = $this->authService->verifyCredentials($username, $password);
    
        if ($user) {
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }
            $_SESSION['user'] = [
                'id' => $user['UserID'],
                'username' => $user['Username'],
                'role' => $user['Role']
            ];
    
            $response = [
                'success' => true,
                'message' => 'Login successful',
                'user' => [
                    'id' => $user['UserID'],
                    'username' => $user['Username'],
                    'role' => $user['Role']
                ]
            ];
        } else {
            $response = [
                'success' => false,
                'message' => 'Invalid credentials'
            ];
        }
    
        header('Content-Type: application/json');
        echo json_encode($response);
    }    
    
    public function logout()
    {
        // Menghapus semua data sesi
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        session_unset();
        session_destroy();

        // Mengirimkan respon JSON
        $response = [
            'success' => true,
            'message' => 'Logout successful'
        ];

        header('Content-Type: application/json');
        echo json_encode($response);
    }
}
