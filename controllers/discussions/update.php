<?php

if (!logged_in()) {
    redirect('/login');
}

$form = new DiscussionForm($_POST);

if ($form->invalid()) {
    Session::flash('errors', $form->errors());
    redirect_back();
}

$id = $_POST['id'];
$title = $_POST['title'];
$body = $_POST['body'];
$categoryId = $_POST['category_id'];

$repo = App::resolve(DiscussionRepository::class);
$discussion = $repo->find($id);

$user = Session::user();

authorize(
    $user && (
        $user->id() === $discussion->author()->id() 
        || $user->isAdmin() 
        || $user->isModerator()
    )
);

if ($discussion->title() !== $title) {
    $discussion->setTitle($title);
}

$discussion->setBody($body);
$discussion->setCategory(Category::fromId($categoryId));

(App::resolve(Database::class))->query("
    UPDATE discussions
    SET slug = :slug, title = :title, body = :body, category_id = :category_id
    WHERE id = :id
", [
    'slug' => $discussion->slug(),
    'title' => $discussion->title(),
    'body' => $discussion->body(),
    'category_id' => $discussion->category()->id(),
    'id' => $discussion->id(),
]);

redirect('/');
