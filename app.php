<?php
session_start();

include_once 'Config/database.php';
include_once 'Controller/ComicsController.php';
include_once 'Middleware/Router.php';

$database = new Database();
$db = $database->getConnection();

$router = new Router();

// Register routes
$router->register('GET', '/comics', function() use ($db) {
    $controller = new ComicsController($db);
    return $controller->getComics();
});

$router->register('POST', '/comics', function() use ($db) {
    $controller = new ComicsController($db);
    return $controller->createComic();
});

$router->register('PUT', '/comics/{id}', function($id) use ($db) {
    $controller = new ComicsController($db);
    return $controller->updateComic($id);
});

$router->register('DELETE', '/comics/{id}', function($id) use ($db) {
    $controller = new ComicsController($db);
    return $controller->deleteComic($id);
});

// Parse URI and method
$uri = $_SERVER['REQUEST_URI'];
$method = $_SERVER['REQUEST_METHOD'];

// Dispatch the request
$router->dispatch($method, $uri);
?>
