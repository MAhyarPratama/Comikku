<?php
session_start();

include_once "Config/database.php";
include_once "Controller/AuthController.php";
include_once "Controller/ComicsController.php";
include_once "Controller/UserController.php";
include_once "Middleware/Router.php";
include_once "Middleware/AdminMiddleware.php";
include_once "Config/Config.php";

$database = new Database();
$db = $database->getConnection();

$router = new Router();

// Register routes for comics
$router->register('GET', '/Comikku2/api/comics', function() use ($db) {
    $controller = new ComicsController($db);
    $controller->getComics();
});

// Register routes for users
$router->register('GET', '/Comikku2/api/users', function() use ($db) {
    $controller = new UserController($db);
    $controller->getAllUsers();
});

$router->register('GET', '/Comikku2/api/admin', function() use ($db) {
    $controller = new UserController($db);
    $controller->getUsersByRole('admin');
});

// Register routes for authentication
$router->register('POST', '/Comikku2/api/login', function() use ($db) {
    $controller = new AuthController($db);
    $controller->login();
});

$router->register('POST', '/Comikku2/api/logout', function() use ($db) {
    $controller = new AuthController($db);
    $controller->logout();
});

$router->register('POST', '/Comikku2/api/register', function() use ($db) {
    $controller = new UserController($db);
    $controller->registerUser();
});

$router->register('GET', '/api/admin/users', function() use ($db) {
    $controller = new UserController($db);
    $controller->getAllUsers();
}, ['AdminMiddleware']);

$router->register('POST', '/Comikku2/api/admin/users', function() use ($db) {
    AdminMiddleware::handle(function() use ($db) {
        $controller = new UserController($db);
        $controller->adminAddUser();
    });
});

// Endpoint untuk menghapus user berdasarkan ID
$router->register('DELETE', '/Comikku2/api/admin/users/{id}', function($id) use ($db) {
    AdminMiddleware::handle(function() use ($db, $id) {
        $controller = new UserController($db);
        $controller->adminDeleteUser($id);
    });
});

// Endpoint untuk menghapus comic berdasarkan ID
$router->register('DELETE', '/Comikku2/api/admin/comics/{id}', function($id) use ($db) {
    AdminMiddleware::handle(function() use ($db, $id) {
        $controller = new ComicsController($db);
        $controller->deleteComic($id);
    });
});

// Parse URI and method
$uri = $_SERVER['REQUEST_URI'];
$method = $_SERVER['REQUEST_METHOD'];

// Debugging URI and method
error_log("URI: " . $uri);
error_log("Method: " . $method);

// Dispatch the request
$router->handleRequest();
