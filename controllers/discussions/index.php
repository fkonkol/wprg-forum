<?php

$repo = App::resolve(DiscussionRepository::class);

$filters = new Filters($_GET);
if ($filters->hasCategory()) {
    [$discussions, $metadata] = $repo->filter($filters);
} else {
    $discussions = $repo->latest();
}

render('discussions/index', [
    'title' => 'Discussions',
    'discussions' => $discussions,
    'filters' => $filters,
    'metadata' => $metadata ?? null,
]);
