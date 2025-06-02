<?php

$db = new Database;

$data = $db->query('
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
', [
    'discussion_slug' => $_GET['slug'],
    'category_slug' => $_GET['category'], 
])->tryFetch();

$discussion = new Discussion($data);

$comments = $db->query("
    select c.id
         , c.created_at
         , c.discussion_id
         , c.body
         , COALESCE(u.name, c.guest_name) as user_name 
    from comments as c
    left join users as u on c.user_id = u.id
    where c.discussion_id = :discussion_id
", [
    'discussion_id' => $discussion->id(),
])->fetchAll();

render('discussions/show', [
    'title' => $discussion->title(),
    'discussion' => $discussion,
    'comments' => $comments,
]);
