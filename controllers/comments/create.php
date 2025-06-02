<?php

// TODO: Validate the request.

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $db = new Database;

    if (!Session::user()) {
        $db->query("
            insert into comments (discussion_id, guest_name, body)
            values (:discussion_id, :guest_name, :body)
        ", [
            'discussion_id' => $_POST['discussion_id'],
            'guest_name' => $_POST['guest_name'],
            'body' => $_POST['body'],
        ]);
    } else {
        $db->query("
            insert into comments (discussion_id, user_id, body)
            values (:discussion_id, :user_id, :body)
        ", [
            'discussion_id' => $_POST['discussion_id'],
            'user_id' => Session::user()->id(),
            'body' => $_POST['body'],
        ]);
    }

}

redirect_back();
