<?php

if (!logged_in()) {
    redirect('/login');
}

$repo = App::resolve(DiscussionRepository::class);

$id = $_POST['id'];
$discussion = $repo->find($id);

$user = Session::user();

authorize($user && ($user->id() === $discussion->author()->id()));

$repo->destroy($id);

redirect('/');
