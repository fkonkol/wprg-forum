<?php

// TODO: Validate query params.

$filters = new Filters($_GET);

$repo = new DiscussionRepository(new Database);
[$discussions, $metadata] = $repo->filter($filters);

render('discussions/index', [
    'title' => 'Discussions',
    'discussions' => $discussions,
    'filters' => $filters,
    'metadata' => $metadata,
]);
