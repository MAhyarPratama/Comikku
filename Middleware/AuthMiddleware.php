<?php
class AuthMiddleware
{
    public static function handle($next)
    {
        session_start();
        if (!isset($_SESSION['user'])) {
            http_response_code(401);
            echo json_encode(['message' => 'Unauthorized']);
            exit();
        } else {
            $next();
        }
    }

    public static function authorize($role)
    {
        self::handle(function() {});

        if ($_SESSION['user']['role'] !== $role) {
            http_response_code(403);
            echo json_encode(['message' => 'Forbidden']);
            exit();
        }
    }
}
