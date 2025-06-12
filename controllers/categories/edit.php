<?php

if (!Session::user()) {
    halt();
}

authorize(Session::user()->isAdmin());

$db = App::resolve(Database::class);

$category = $db->query("
    select * from categories
    where id = :id
", [
    'id' => $_GET['id'],
])->tryFetch();

render('categories/edit', [
    'category' => $category,
    'errors' => $_SESSION['_flash']['errors'] ?? [],
]);
