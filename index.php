<?php

require 'functions.php';

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

if ($uri === '/') {
    require 'controllers/index.php';
} else if ($uri === '/show_discussion') {
    require 'controllers/show_discussion.php';
} else {
    echo 'Not found';
    exit;
}
