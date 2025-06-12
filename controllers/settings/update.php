<?php

$db = new Database;

if (!Session::user()) {
    redirect('/login');
}

$form = new SettingsForm($_POST);

if ($form->invalid()) {
    Session::flash('errors', $form->errors());
    redirect_back();
}

$db->query("
    UPDATE users
    SET name = :username
    WHERE id = :id
", [
    'username' => $_POST['username'],
    'id' => Session::user()->id(),
]);

$_SESSION['user']['name'] = $username;

redirect('/settings');
