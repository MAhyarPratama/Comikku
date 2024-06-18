<?php
class AdminMiddleware
{
    public static function handle($next)
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        // Menambahkan logging untuk memeriksa isi sesi
        error_log("Session Data: " . print_r($_SESSION, true));

        if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
            http_response_code(403);
            echo json_encode(["message" => "Forbidden"]);
            return false;
        }

        return $next();
    }
}
