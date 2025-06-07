<?php

// TODO: Validate the request here.

$username = $_POST['username'];
$password = $_POST['password'];

$user = (new Database)->query(
    "select * from users where name = :name",
    [
        'name' => $username,
    ]
)->fetch();

if ($user) {
    if (password_verify($password, $user['password'])) {
        $_SESSION['user'] = [
            'id' => $user['id'],
            'name' => $user['name'],
        ];
        session_regenerate_id(true);

        redirect('/');
    };
}

redirect('/login');
