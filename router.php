<?php

$router = new Router();

$router->get('/', 'discussions/index');
$router->get('/discussions', 'discussions/show');
$router->get('/discussions/new', 'discussions/new');
$router->get('/discussions/edit', 'discussions/edit');
$router->put('/discussions', 'discussions/update');
$router->post('/discussions', 'discussions/create');
$router->delete('/discussions', 'discussions/destroy');

$router->post('/comments', 'comments/create');
$router->get('/comments/edit', 'comments/edit');
$router->put('/comments', 'comments/update');
$router->delete('/comments', 'comments/destroy');

$router->get('/categories', 'categories/index');
$router->post('/categories', 'categories/create');
$router->put('/categories', 'categories/update');
$router->delete('/categories', 'categories/destroy');
$router->get('/categories/new', 'categories/new');
$router->get('/categories/edit', 'categories/edit');

$router->get('/register', 'registrations/new');
$router->post('/register', 'registrations/create');

$router->get('/login', 'sessions/new');
$router->post('/login', 'sessions/create');
$router->post('/logout', 'sessions/destroy');

$router->get('/settings', 'settings/edit');
$router->post('/settings', 'settings/update');
$router->put('/settings/avatar', 'settings/avatar/update');

$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];
$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

$router->dispatch($method, $uri);
