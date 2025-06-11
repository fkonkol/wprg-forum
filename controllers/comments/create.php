<?php

$db = App::resolve(Database::class);

if (!Session::user()) {
    $form = new AnonymousCommentForm($_POST);

    if ($form->invalid()) {
        Session::flash('errors', $form->errors());
        redirect_back();
    }

    $db->query("
        insert into comments (discussion_id, guest_name, body)
        values (:discussion_id, :guest_name, :body)
    ", [
        'discussion_id' => $_POST['discussion_id'],
        'guest_name' => $_POST['guest_name'],
        'body' => $_POST['body'],
    ]);
} else {
    $form = new UserCommentForm($_POST);

    if ($form->invalid()) {
        Session::flash('errors', $form->errors());
        redirect_back();
    }

    $db->query("
        insert into comments (discussion_id, user_id, body)
        values (:discussion_id, :user_id, :body)
    ", [
        'discussion_id' => $_POST['discussion_id'],
        'user_id' => Session::user()->id(),
        'body' => $_POST['body'],
    ]);
}

redirect_back();
