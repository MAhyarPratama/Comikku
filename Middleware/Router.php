<?php

class Router
{
    private $routes = [];

    public function register($method, $route, $callback, $middlewares = [])
    {
        $this->routes[] = [
            'method' => strtoupper($method),
            'route' => $route,
            'callback' => $callback,
            'middlewares' => $middlewares
        ];
    }

    public function handleRequest()
    {
        $requestMethod = $_SERVER['REQUEST_METHOD'];
        $requestUri = $_SERVER['REQUEST_URI'];

        foreach ($this->routes as $route) {
            if ($this->matchRoute($route, $requestMethod, $requestUri)) {
                $this->handleRoute($route);
                return;
            }
        }

        http_response_code(404);
        echo json_encode(['message' => 'Not Found']);
    }

    private function matchRoute($route, $requestMethod, $requestUri)
    {
        if ($route['method'] !== $requestMethod) {
            return false;
        }

        $routePattern = preg_replace('/\{[a-zA-Z0-9]+\}/', '([a-zA-Z0-9]+)', $route['route']);
        $routePattern = str_replace('/', '\/', $routePattern);

        return preg_match('/^' . $routePattern . '$/', $requestUri);
    }

    private function handleRoute($route)
    {
        $middlewares = $route['middlewares'];
        $callback = $route['callback'];

        foreach ($middlewares as $middleware) {
            $middleware::handle(function() use ($callback) {
                $callback();
            });
        }

        if (empty($middlewares)) {
            $callback();
        }
    }
}
