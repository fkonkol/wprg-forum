<?php

$router = new Router();

$router->get('/', 'discussions/index');
$router->get('/discussions', 'discussions/show');
$router->get('/discussions/new', 'discussions/new');
$router->get('/discussions/edit', 'discussions/edit');
$router->put('/discussions', 'discussions/update');
$router->post('/discussions', 'discussions/create');
$router->delete('/discussions', 'discussions/destroy');
$router->get('/register', 'registrations/new');
$router->post('/register', 'registrations/create');
$router->get('/login', 'sessions/new');
$router->post('/login', 'sessions/create');
$router->post('/logout', 'sessions/destroy');
$router->post('/comments', 'comments/create');
$router->get('/settings', 'settings/edit');
$router->post('/settings', 'settings/update');

$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];
$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

$router->dispatch($method, $uri);
