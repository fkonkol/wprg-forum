<?php require 'views/partials/head.php' ?>

<main>
    <p>
        <a href="/">Discussions</a>
        &rarr;
        <a href="#">Topic: <?= htmlspecialchars($discussion['category_name']) ?></a>
        &rarr;
        <a href="#"><?= htmlspecialchars($discussion['title']) ?></a>
    </p>

    <h1><?= htmlspecialchars($discussion['title']) ?></h1>
    <p><?= htmlspecialchars($discussion['user_name']) ?></p>
    <p><?= htmlspecialchars($discussion['body']) ?></p>
</main>

<?php require 'views/partials/foot.php' ?>
