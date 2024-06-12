<?php
class AuthMiddleware
{
    public static function authenticate()
    {
        // Contoh sederhana menggunakan sesi untuk autentikasi
        if (!isset($_SESSION['user'])) {
            http_response_code(401);
            echo json_encode(['message' => 'Unauthorized']);
            exit();
        }
    }

    public static function authorize($role)
    {
        self::authenticate();

        if ($_SESSION['user']['role'] !== $role) {
            http_response_code(403);
            echo json_encode(['message' => 'Forbidden']);
            exit();
        }
    }
}