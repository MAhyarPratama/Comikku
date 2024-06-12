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
        // Mendapatkan data dari request
        $data = json_decode(file_get_contents("php://input"), true);
        $username = $data['username'] ?? '';
        $password = $data['password'] ?? '';

        // Memverifikasi kredensial pengguna
        $user = $this->authService->verifyCredentials($username, $password);

        if ($user) {
            // Menyimpan informasi pengguna dalam sesi
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['role'] = $user['role'];

            $response = [
                'success' => true,
                'message' => 'Login successful',
                'user' => [
                    'id' => $user['id'],
                    'username' => $user['username'],
                    'role' => $user['role']
                ]
            ];
        } else {
            $response = [
                'success' => false,
                'message' => 'Invalid credentials'
            ];
        }

        // Mengirimkan respon JSON
        header('Content-Type: application/json');
        echo json_encode($response);
    }

    public function logout()
    {
        // Menghapus semua data sesi
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
?>