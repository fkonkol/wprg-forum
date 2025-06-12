<?php

if (!Session::user()) {
    halt();
}

authorize(Session::user()->isAdmin());

$db = App::resolve(Database::class);

$db->query("
    delete from categories 
    where id = :id
", [
    'id' => $_POST['id'],
]);

redirect('/categories');
