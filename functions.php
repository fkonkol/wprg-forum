<?php

function dd($value) {
    echo '<pre>';
    var_dump($value);
    echo '</pre>';
    exit;
}

function render($view, $context = []) {
    extract($context);
    require "views/{$view}";
}
