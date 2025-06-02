<?php

require 'Database.php';
require 'Filters.php';
require 'Metadata.php';

$filters = new Filters($_GET);

$discussions = (new Database)->query("
    select d.id
         , d.slug
         , d.created_at
         , d.title
         , d.body
         , c.id as category_id
         , c.name as category_name
         , c.slug as category_slug
         , u.id as user_id
         , u.name as user_name
         , count(*) over() as count
      from discussions as d
      join categories as c on d.category_id = c.id
      join users as u on d.user_id = u.id
      where c.slug = :category_slug or :category_slug = ''
      order by created_at desc
      limit {$filters->limit()} offset {$filters->offset()}
", [
    'category_slug' => $filters->category(),
])->fetchAll();

$count = $discussions[0]['count'] ?? 0;

render('discussions/index', [
    'category' => $filters->category(),
    'title' => 'Discussions',
    'discussions' => $discussions,
    'filters' => $filters,
    'metadata' => new Metadata($filters->page(), $filters->limit(), $count),
]);
