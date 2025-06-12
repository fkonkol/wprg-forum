<?php

if (!Session::user()) {
    halt();
}

authorize(Session::user()->isAdmin());

$db = App::resolve(Database::class);

$categories = $db->query("select * from categories")->fetchAll();

render('categories/index', [
    'categories' => $categories,
]);
