<?php

// TODO: Validate the request form
// dd($_POST);

if (!logged_in()) {
    redirect('/login');
}

$repo = App::resolve(DiscussionRepository::class);
$repo->create($_POST);

redirect('/');
