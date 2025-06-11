<?php

// TODO: Validate the request here.

$username = $_POST['username'];
$password = $_POST['password'];

$db = App::resolve(Database::class);

$user = $db->query(
    "select * from users where name = :name",
    [
        'name' => $username,
    ]
)->fetch();

if (!$user) {
    $db->query("
        insert into users (name, password, avatar_url, role)
        values (:name, :password, :avatar_url, :role)
    ", [
        'name' => $username,
        'password' => password_hash($password, PASSWORD_DEFAULT),
        'avatar_url' => '/static/img/avatar.png',
        'role' => Role::USER->value,
    ]);

    // TODO: Login the user here.
}

redirect('/');
