<?php

$repo = new DiscussionRepository(new Database);

$discussion = $repo->findBySlugAndCategory($_GET['slug'], $_GET['category']);
$comments = $repo->comments($discussion->id());

render('discussions/show', [
    'title' => $discussion->title(),
    'discussion' => $discussion,
    'comments' => $comments,
    'comments_count' => $comments[0]['count'] ?? 0,
]);
