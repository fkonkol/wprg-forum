<?php

require 'Database.php';

$discussions = (new Database)->query('
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
      order by created_at desc
')->fetchAll();

render('discussions/index', [
    'title' => 'Discussions',
    'discussions' => $discussions,
]);
