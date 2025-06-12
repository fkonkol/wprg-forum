<?php

if (!Session::user()) {
    halt();
}

authorize(Session::user()->isAdmin());

$db = App::resolve(Database::class);

$form = new CategoryForm($_POST);
if ($form->invalid()) {
    Session::flash('errors', $form->errors());
    redirect_back();
}

$db->query("
    update categories
    set name = :name, slug = :slug
    where id = :id
", [
    'name' => $_POST['name'],
    'slug' => $_POST['slug'],
    'id' => $_POST['id'],
]);

redirect('/categories');
