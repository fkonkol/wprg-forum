<?php

$form = new AuthForm($_POST);

if ($form->invalid()) {
    Session::flash('errors', ['login' => 'Invalid email or password.']);
    redirect_back();
}

$user = App::resolve(Database::class)->query(
    "select * from users where name = :name",
    [
        'name' => $_POST['username'],
    ]
)->fetch();

if ($user && password_verify($_POST['password'], $user['password'])) {
    $_SESSION['user'] = [
        'id' => $user['id'],
        'name' => $user['name'],
        'avatar_url' => $user['avatar_url'],
        'role' => $user['role'],
    ];
    session_regenerate_id(true);
    redirect('/');
} else {
    Session::flash('errors', ['login' => 'Invalid email or password.']);
    redirect('/login');
}
