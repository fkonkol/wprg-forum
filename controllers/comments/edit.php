<?php

if (!logged_in()) {
    redirect('/login');
}

$repo = App::resolve(CommentRepository::class);

$user = Session::user();
$comment = $repo->find($_GET['id']);

authorize(
    $user && (
        $user->isAdmin() || $user->isModerator()
    )
);

render('comments/edit', [
    'comment' => $comment,
    'errors' => $_SESSION['_flash']['errors'] ?? [],
]);
