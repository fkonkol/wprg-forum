<?php

$db = new Database;

if (!Session::user()) {
    redirect('/login');
}

$username = $_POST['username'];

// TODO: Validate the request.

$db->query("
    UPDATE users
    SET name = :username
    WHERE id = :id
", [
    'username' => $username,
    'id' => Session::user()->id(),
]);

$_SESSION['user']['name'] = $username;

redirect('/settings');
