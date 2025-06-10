<?php

if (!logged_in()) {
    redirect('/login');
}

$db = App::resolve(Database::class);

if (isset($_FILES['avatar']) && $_FILES['avatar']['error'] === 0) {
    $uploadDir = base_path('public/storage/avatars/');
    $filename = uniqid() . '-' . basename($_FILES['avatar']['name']);
    $targetFile = $uploadDir . $filename;
    if (move_uploaded_file($_FILES['avatar']['tmp_name'], $targetFile)) {
        $db->query("
            UPDATE users
            SET avatar_url = :avatar_url
            WHERE id = :id
        ", [
            'id' => Session::user()->id(),
            'avatar_url' => avatar_path($filename),
        ]);

        $_SESSION['user']['avatar_url'] = avatar_path($filename);
    } else {
        echo "Failed to upload file.";
    }
}

redirect('/settings');
