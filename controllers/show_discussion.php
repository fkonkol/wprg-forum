<?php

$discussions = require 'mock_data.php';

$discussion = array_filter($discussions, function($discussion) {
    $slug = $_GET['slug'] ?? '';
    $category = $_GET['category'] ?? '';
    return $discussion['slug'] === $slug && $discussion['category']['slug'] === $category;
});
$discussion = reset($discussion);

if (empty($discussion)) {
    halt();
}

render('show_discussion', [
    'discussion' => $discussion,
]);
