<?php
session_start();

include_once (__DIR__ . '/Config/database.php');
include_once (__DIR__ . '/Controller/ComicsController.php');
include_once (__DIR__ . '/Controller/AuthController.php');
include_once (__DIR__ . '/Controller/UserController.php');
include_once (__DIR__ . '/Middleware/Router.php');
include_once (__DIR__ . '/Config.php');

$database = new Database();
$db = $database->getConnection();

$router = new Router();

// Register routes for comics
$router->register('GET', '/Comikku/api/comics', function() use ($db) {
    $controller = new ComicsController($db);
    $controller->getComics();
});

// Register routes for users
$router->register('GET', '/Comikku/api/users', function() use ($db) {
    $controller = new UserController($db);
    $controller->getAllUsers();
});

$router->register('GET', '/Comikku/api/admin', function() use ($db) {
    $controller = new UserController($db);
    $controller->getUsersByRole('admin');
});

// Register routes for authentication
$router->register('POST', '/Comikku/api/login', function() use ($db) {
    $controller = new AuthController($db);
    $controller->login();
});

$router->register('POST', '/Comikku/api/logout', function() use ($db) {
    $controller = new AuthController($db);
    $controller->logout();
});

// Parse URI and method
$uri = $_SERVER['REQUEST_URI'];
$method = $_SERVER['REQUEST_METHOD'];

// Debugging URI and method
error_log("URI: " . $uri);
error_log("Method: " . $method);

// Dispatch the request
$router->dispatch($method, $uri);
