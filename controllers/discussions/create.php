<?php

// TODO: Validate the request form
// dd($_POST);

if (!logged_in()) {
    redirect('/login');
}

$form = new DiscussionForm($_POST);

if ($form->invalid()) {
    Session::flash('errors', $form->errors());
    redirect_back();
}

$repo = App::resolve(DiscussionRepository::class);
$repo->create($_POST);

redirect('/');
