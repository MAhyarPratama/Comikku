<?php
class Router
{
    private $routes = array();

    public function register($method, $route, $callback)
    {
        $this->routes[strtoupper($method)][$route] = $callback;
    }

    public function dispatch($method, $uri)
    {
        $uri = parse_url($uri, PHP_URL_PATH); // Extract the path from the URI
        foreach ($this->routes[strtoupper($method)] as $route => $callback)
        {
            $routePattern = preg_replace('/{[^\/]+}/', '([^\/]+)', $route);
            if (preg_match("#^$routePattern$#", $uri, $matches))
            {
                array_shift($matches);
                call_user_func_array($callback, $matches);
                return;
            }
        }
        header("Content-Type: application/json");
        http_response_code(404);
        echo json_encode(array("success" => false, "message" => "Resource not found."));
    }
}
