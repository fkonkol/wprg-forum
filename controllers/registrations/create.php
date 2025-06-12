<?php

$form = new AuthForm($_POST);

if ($form->invalid()) {
    Session::flash('errors', $form->errors());
    redirect_back();
}

$db = App::resolve(Database::class);

$user = $db->query(
    "select * from users where name = :name",
    [
        'name' => $_POST['username'],
    ]
)->fetch();

if (!$user) {
    $db->query("
        insert into users (name, password, avatar_url, role)
        values (:name, :password, :avatar_url, :role)
    ", [
        'name' => $_POST['username'],
        'password' => password_hash($_POST['password'], PASSWORD_DEFAULT),
        'avatar_url' => '/static/img/avatar.png',
        'role' => Role::USER->value,
    ]);
} else {
    redirect('/login');
}

redirect('/');
