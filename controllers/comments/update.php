<?php

if (!logged_in()) {
    redirect('/login');
}

$user = Session::user();
authorize($user && ($user->isAdmin() || $user->isModerator()));

$repo = App::resolve(CommentRepository::class);
$comment = $repo->find($_POST['id']);

if ($comment->isGuest()) {
    $form = new AnonymousCommentForm($_POST);
} else {
    $form = new UserCommentForm($_POST);
}

if ($form->invalid()) {
    Session::flash('errors', $form->errors());
    redirect_back();
}

if ($comment->isGuest()) {
    $comment->setGuestName($_POST['guest_name']);
}
$comment->setBody($_POST['body']);

$db = App::resolve(Database::class);

if ($comment->isGuest()) {
    $db->query("
        update comments 
        set guest_name = :guest_name, body = :body
        where id = :id
    ", [
        'guest_name' => $_POST['guest_name'],
        'body' => $_POST['body'],
        'id' => $comment->id(),
    ]);
} else {
    $db->query("
        update comments 
        set body = :body
        where id = :id
    ", [
        'body' => $_POST['body'],
        'id' => $comment->id(),
    ]);
}

redirect('/');
