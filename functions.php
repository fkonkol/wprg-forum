<?php

function dd($value) {
    echo '<pre>';
    var_dump($value);
    echo '</pre>';
    exit;
}

function render($view, $context = []) {
    extract($context);
    require base_path("views/{$view}.view.php");
}

function halt($status = 404) {
    http_response_code($status);
    require base_path("views/{$status}.view.php");
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

function pluralize(int $n, string $single, ?string $many = null) {
    $inflection = ($n === 1) ? $single : ($many ?? "{$single}s");
    return "$n $inflection";
}

// timeAgo is a very rough implementation of Rails' `time_ago_in_words`.
function timeAgo(DateTime $then) {
    $seconds = (new DateTime)->getTimestamp() - $then->getTimestamp();
    $minutes = floor($seconds / 60);
    $hours = floor($minutes / 60);
    $days = floor($hours / 24);
    $weeks = floor($days / 7);
    $months = floor($weeks / 4);
    $years = floor($months / 12);

    return match (true) {
        $years > 0 => pluralize($years, 'year') . " ago",
        $months > 0 => pluralize($months, 'month') . " ago",
        $weeks > 0 => pluralize($weeks, 'week') . " ago",
        $days > 0 => pluralize($days, 'day') . " ago",
        $hours > 0 => pluralize($hours, 'hour') . " ago",
        $minutes > 0 => pluralize($minutes, 'minute') . " ago",
        $seconds < 0 => "In the future",
        $seconds < 5 => "Less than 5 seconds ago",
        $seconds < 10 => "Less than 10 seconds ago",
        $seconds < 20 => "Less than 20 seconds ago",
        $seconds < 40 => "Half a minute ago",
        default => "Less than a minute ago",
    };
}

function redirect($path) {
    header("Location: {$path}");
    exit;
}

function base_path($path) {
    return BASE_PATH . $path;
}

function redirect_back($fallback = '/') {
    $path = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : $fallback;
    redirect($path);
}

function authorize(bool $ok, int $status = 403) {
    if (!$ok) {
        halt($status);
    }

    return true;
}
