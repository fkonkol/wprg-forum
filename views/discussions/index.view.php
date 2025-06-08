<?php require base_path('views/partials/head.php') ?>
<?php require base_path('views/partials/navigation.php') ?>

<main class="container flow with-sidebar" style="--flow-space: 2rem;">
    <div class="flow">
        <?php require base_path('views/partials/key-header.php') ?>

        <div class="divide">
            <?php foreach ($discussions as $discussion): ?>
                <article class="entry padding-block-16">
                    <div class="card__inner">
                        <img src="/static/img/avatar.png" alt="Profile picture of <?= e($discussion->author()->name()) ?>" class="avatar">
                        <div>
                            <a href="<?= show_discussion_path($discussion) ?>">
                                <h2 class="fs-400"><?= e($discussion->title()) ?></h2>
                            </a>
                            <p class="text-neutral-6">
                                <time datetime="<?= e($discussion->createdAt()->format(DateTimeInterface::RFC3339)) ?>">
                                    <?= time_ago($discussion->createdAt()) ?>
                                </time>
                                by <?= e($discussion->author()->name()) ?> in 
                                <a href="/?category=<?= e($discussion->category()->slug()) ?>" class="[ with-icon ] [ text-blueberry-6 fw-bold ]">
                                    <svg class="icon" style="--space: 0.3em">
                                        <use href="#<?= e($discussion->category()->slug()) ?>"></use>
                                    </svg>
                                    <?= e($discussion->category()->name()) ?>
                                </a>
                            </p>
                        </div>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>

        <?php require base_path('views/partials/pagination.php') ?>
    </div>

    <div class="sidebar">
    </div>
</main>

<?php require base_path('views/partials/foot.php') ?>
