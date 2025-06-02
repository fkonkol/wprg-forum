<?php

require 'Database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // TODO: Validate the request here.

    $username = $_POST['username'];
    $password = $_POST['password'];

    $db = new Database;

    $user = $db->query(
       "select * from users where name = :name",
        [
            'name' => $username,
        ]
    )->fetch();

    if (!$user) {
        $db->query("
            insert into users (name, password)
            values (:name, :password)
        ", [
            'name' => $username,
            'password' => password_hash($password, PASSWORD_DEFAULT),
        ]);

        // TODO: Login the user here.
    }

    redirect('/');
}

render('registrations/new');
