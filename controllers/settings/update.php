<?php


if (!Session::user()) {
    redirect('/login');
}

$form = new SettingsForm($_POST);

if ($form->invalid()) {
    Session::flash('errors', $form->errors());
    redirect_back();
}

$db = App::resolve(Database::class);

$existingUser = $db->query("
    select *
    from users
    where name = :username
", [
    'username' => $_POST['username'],
]);

if (!$existingUser) {
    $db->query("
        update users
        set name = :username
        where id = :id
    ", [
        'username' => $_POST['username'],
        'id' => Session::user()->id(),
    ]);

    $_SESSION['user']['name'] = $username;
} else {
    Session::flash('errors', ['username' => 'This username is already taken.']);
}

redirect('/settings');
