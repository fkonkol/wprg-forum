<?php

$repo = App::resolve(DiscussionRepository::class);

$discussion = $repo->findBySlugAndCategory($_GET['slug'], $_GET['category']);
[$comments, $commentsCount] = $repo->comments($discussion->id());

render('discussions/show', [
    'title' => $discussion->title(),
    'discussion' => $discussion,
    'comments' => $comments,
    'comments_count' => $commentsCount,
    'errors' => $_SESSION['_flash']['errors'] ?? [],
]);
