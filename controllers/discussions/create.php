<?php

// TODO: Validate the request form
// dd($_POST);

if (!Session::user()) {
    redirect('/login');
}

$repo = new DiscussionRepository(new Database);

$repo->create($_POST);

redirect('/');
