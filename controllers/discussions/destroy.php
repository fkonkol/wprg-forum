<?php

$db = new Database;
$repo = new DiscussionRepository($db);

$id = $_POST['id'];
$discussion = $repo->find($id);

$user = Session::user();

authorize($user && ($user->id() === $discussion->author()->id()));

$db->query("
    DELETE FROM discussions
    WHERE id = :id
", [
    'id' => $_POST['id'],
]);

redirect('/');
