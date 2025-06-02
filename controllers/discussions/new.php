<?php

if (!isset($_SESSION['user'])) {
    redirect('/login');
}

render('discussions/new', [
    'title' => 'Create a new discussion',
]);
