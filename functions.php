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

// https://accreditly.io/articles/how-to-make-a-url-slug-in-php
function slugify($string) {
    $slug = strtolower($string);
    $slug = iconv('UTF-8', 'ASCII//TRANSLIT', $slug);
    $slug = preg_replace('/[^a-z0-9\s]/', '', $slug);
    $slug = str_replace(' ', '-', $slug);
    $slug = trim($slug, '-');
    $slug .= "-" . bin2hex(random_bytes(2));

    return $slug;
}
