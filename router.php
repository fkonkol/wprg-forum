<?php

class Router
{
    private array $routes = [];

    public function dispatch(string $method, string $uri)
    {
        foreach ($this->routes as $route) {
            if ($route['method'] === $method && $route['uri'] === $uri) {
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
}

$router = new Router();

$router->get('/', 'controllers/discussions/index.php');
$router->get('/discussions', 'controllers/discussions/show.php');
$router->get('/discussions/new', 'controllers/discussions/new.php');
$router->post('/discussions', 'controllers/discussions/create.php');
$router->get('/register', 'controllers/registrations/new.php');
$router->post('/register', 'controllers/registrations/create.php');
$router->get('/login', 'controllers/sessions/new.php');
$router->post('/login', 'controllers/sessions/create.php');
$router->post('/logout', 'controllers/sessions/destroy.php');
$router->post('/comments', 'controllers/comments/create.php');
$router->get('/settings', 'controllers/settings/edit.php');
$router->post('/settings', 'controllers/settings/update.php');

$method = $_SERVER['REQUEST_METHOD'];
$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

$router->dispatch($method, $uri);
