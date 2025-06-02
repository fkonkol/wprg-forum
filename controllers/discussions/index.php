<?php

require 'Database.php';

$category = $_GET['category'] ?? '';

$page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int) $_GET['page'] : 1;
$limit = 5;

$offset = ($page - 1) * $limit;

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
      limit $limit offset $offset
", [
    'category_slug' => $category,
])->fetchAll();

if (count($discussions) > 0) {
    $discussionsCount = $discussions[0]['count'];
    $totalPages = ceil($discussionsCount / $limit);
}

render('discussions/index', [
    'category' => $category,
    'title' => 'Discussions',
    'discussions' => $discussions,
    'discussionsCount' => $discussionsCount ?? 0,
    'totalPages' => $totalPages ?? 0,
]);
