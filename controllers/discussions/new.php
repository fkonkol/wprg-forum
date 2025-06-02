<?php

if (!Session::user()) {
    redirect('/login');
}

render('discussions/new', [
    'title' => 'Create a new discussion',
]);
