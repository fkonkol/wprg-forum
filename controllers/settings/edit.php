<?php

if (!Session::user()) {
    redirect('/login');
}

render('settings/edit', [
    'errors' => $_SESSION['_flash']['errors'] ?? [],
]);
