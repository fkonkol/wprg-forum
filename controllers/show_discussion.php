<?php

$dsn = "mysql:host=localhost;port=3306;dbname=wprg;charset=utf8mb4";
$pdo = new PDO($dsn, 'root');

$stmt = $pdo->prepare('
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
      from discussions as d
      join categories as c on d.category_id = c.id
      join users as u on d.user_id = u.id
     where d.slug = :discussion_slug
       and c.slug = :category_slug
', );

$stmt->execute([
    'discussion_slug' => $_GET['slug'],
    'category_slug' => $_GET['category'],
]);

$discussion = $stmt->fetch(PDO::FETCH_ASSOC);

if (empty($discussion)) {
    halt();
}

render('show_discussion', [
    'discussion' => $discussion,
]);
