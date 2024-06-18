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
        $params = $this->getRouteParams($route['route'], $_SERVER['REQUEST_URI']);

        foreach ($middlewares as $middleware) {
            if (!$middleware::handle()) {
                http_response_code(403);
                echo json_encode(['message' => 'Forbidden']);
                return;
            }
        }

        call_user_func_array($callback, $params);
    }

    private function getRouteParams($route, $requestUri)
    {
        $routePattern = preg_replace('/\{[a-zA-Z0-9]+\}/', '([a-zA-Z0-9]+)', $route);
        $routePattern = str_replace('/', '\/', $routePattern);
        preg_match('/^' . $routePattern . '$/', $requestUri, $matches);
        array_shift($matches);
        return $matches;
    }
}
