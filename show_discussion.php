<?php

require 'functions.php';


$discussions = require 'mock_data.php';

$discussion = array_filter($discussions, function($discussion) {
    $slug = $_GET['slug'] ?? '';
    $category = $_GET['category'] ?? '';
    return $discussion['slug'] === $slug && $discussion['category']['slug'] === $category;
});
$discussion = reset($discussion);

if (empty($discussion)) {
    dd('Not found!');
}

dd($discussion);
