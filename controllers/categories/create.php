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
    insert into categories (name, slug)
    values (:name, :slug)
", [
    'name' => $_POST['name'],
    'slug' => $_POST['slug'],
]);

redirect('/categories');
