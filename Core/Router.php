<?php

class Router
{
    private array $routes = [];

    public function dispatch(string $method, string $uri)
    {
        foreach ($this->routes as $route) {
            if ($route['method'] === strtoupper($method) && $route['uri'] === $uri) {
                return require base_path($route['controller']);
            }
        }

        halt();
    }

    public function addRoute(string $method, string $uri, string $controller)
    {
        $this->routes[] = [
            'method' => $method, 
            'uri' => $uri, 
            'controller' => $controller
        ];
    }

    public function get(string $uri, string $controller)
    {
        $this->addRoute('GET', $uri, $controller);
    }

    public function post(string $uri, string $controller)
    {
        $this->addRoute('POST', $uri, $controller);
    }

    public function delete(string $uri, string $controller)
    {
        $this->addRoute('DELETE', $uri, $controller);
    }

    public function put(string $uri, string $controller)
    {
        $this->addRoute('PUT', $uri, $controller);
    }
}
