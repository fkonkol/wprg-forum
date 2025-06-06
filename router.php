<?php

$routes = [
    '/' => 'controllers/discussions/index.php',
    '/show_discussion' => 'controllers/discussions/show.php',
    '/new_discussion' => 'controllers/discussions/new.php',
    '/create_discussion' => 'controllers/discussions/create.php',
    '/register' => 'controllers/registrations/new.php',
    '/login' => 'controllers/sessions/new.php',
    '/logout' => 'controllers/sessions/destroy.php',
    '/comments/create' => 'controllers/comments/create.php',
];

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

if (array_key_exists($uri, $routes)) {
    require $routes[$uri];
} else {
    halt();
}
