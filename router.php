<?php

$router = new Router();

$router->get('/', 'controllers/discussions/index.php');
$router->get('/discussions', 'controllers/discussions/show.php');
$router->get('/discussions/new', 'controllers/discussions/new.php');
$router->post('/discussions', 'controllers/discussions/create.php');
$router->delete('/discussions', 'controllers/discussions/destroy.php');
$router->get('/register', 'controllers/registrations/new.php');
$router->post('/register', 'controllers/registrations/create.php');
$router->get('/login', 'controllers/sessions/new.php');
$router->post('/login', 'controllers/sessions/create.php');
$router->post('/logout', 'controllers/sessions/destroy.php');
$router->post('/comments', 'controllers/comments/create.php');
$router->get('/settings', 'controllers/settings/edit.php');
$router->post('/settings', 'controllers/settings/update.php');

$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];
$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

$router->dispatch($method, $uri);
