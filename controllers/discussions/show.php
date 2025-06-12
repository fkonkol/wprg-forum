<?php

$discussionsRepo = App::resolve(DiscussionRepository::class);
$commentsRepo = App::resolve(CommentRepository::class);

$discussion = $discussionsRepo->findBySlugAndCategory($_GET['slug'], $_GET['category']);
[$comments, $commentsCount] = $commentsRepo->findAllByDiscussionId($discussion->id());

render('discussions/show', [
    'title' => $discussion->title(),
    'discussion' => $discussion,
    'comments' => $comments,
    'comments_count' => $commentsCount,
    'errors' => $_SESSION['_flash']['errors'] ?? [],
]);
