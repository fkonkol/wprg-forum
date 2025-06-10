<?php

if (!logged_in()) {
    redirect('/login');
}

render('discussions/new', [
    'title' => 'Create a new discussion',
    'errors' => $_SESSION['_flash']['errors'] ?? [],
]);
