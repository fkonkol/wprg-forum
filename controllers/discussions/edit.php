<?php

if (!logged_in()) {
    redirect('/login');
}

$repo = App::resolve(DiscussionRepository::class);

$id = $_GET['id'];
$user = Session::user();
$discussion = $repo->find($id);

authorize(
    $user && (
        $user->id() === $discussion->author()->id() 
        || $user->isAdmin() 
        || $user->isModerator()
    )
);

render('discussions/edit', [
    'discussion' => $discussion,
    'errors' => $_SESSION['_flash']['errors'] ?? [],
]);
