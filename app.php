<?php
require_once 'middleware/Router.php';

$router = new Router();

$method = $_SERVER['REQUEST_METHOD'];
$url = isset($_GET['url']) ? explode('/', rtrim($_GET['url'], '/')) : [];
$requestData = json_decode(file_get_contents('php://input'), true);

$router->route($method, $url, $requestData);
?>
