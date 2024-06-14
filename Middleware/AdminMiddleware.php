<?php
class AdminMiddleware
{
    public static function handle($next)
    {
        session_start();
        if (isset($_SESSION['user']) && $_SESSION['user']['role'] === 'admin') {
            $next();
        } else {
            http_response_code(403);
            echo json_encode(["message" => "Forbidden"]);
            exit();
        }
    }
}