<?php

if (!logged_in()) {
    redirect('/login');
}

$repo = App::resolve(CommentRepository::class);

$user = Session::user();
authorize($user && $user->isAdmin());

$repo->destroy($_POST['id']);

redirect_back();
