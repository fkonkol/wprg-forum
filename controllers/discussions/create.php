<?php

require 'Database.php';

// TODO: Validate the request form
// dd($_POST);

$userId = 1;
(new Database)->query('
    insert into discussions (slug, title, body, category_id, user_id) 
    values (:slug, :title, :body, :category_id, :user_id)
', [
    'slug' => slugify($_POST['title']),
    'title' => $_POST['title'],
    'body' => $_POST['body'],
    'category_id' => $_POST['category_id'],
    'user_id' => $userId,
]);

redirect('/');
