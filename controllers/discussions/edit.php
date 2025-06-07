<?php

if (!Session::user()) {
    redirect('/login');
}

$repo = new DiscussionRepository(new Database());

$id = $_GET['id'];
$user = Session::user();
$discussion = $repo->find($id);

authorize($user && ($user->id() === $discussion->author()->id()));

render('discussions/edit', [
    'discussion' => $discussion,
]);
