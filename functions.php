<?php

function dd($value) {
    echo '<pre>';
    var_dump($value);
    echo '</pre>';
    exit;
}

function render($view, $context = []) {
    extract($context);
    require "views/{$view}.view.php";
}

function halt($status = 404) {
    http_response_code($status);
    require "views/{$status}.view.php";
    exit;
}
