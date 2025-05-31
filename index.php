<?php

require 'functions.php';

$routes = [
    '/' => 'controllers/index.php',
    '/show_discussion' => 'controllers/show_discussion.php',
];

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

if (array_key_exists($uri, $routes)) {
    require $routes[$uri];
} else {
    halt();
}
