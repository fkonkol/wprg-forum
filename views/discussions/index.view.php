<?php require base_path('views/partials/head.php') ?>
<?php require base_path('views/partials/navigation.php') ?>

<main class="container flow with-sidebar" style="--flow-space: 2rem;">
    <div class="flow">
        <?php require base_path('views/partials/key-header.php') ?>

        <div class="divide">
            <?php foreach ($discussions as $discussion): ?>
                <article class="entry padding-block-16">
                    <div class="card__inner">
                        <img src="/static/img/avatar.png" alt="Profile picture of <?= htmlspecialchars($discussion['user_name']) ?>" class="avatar">
                        <div>
                            <a href="/show_discussion?category=<?= htmlspecialchars($discussion['category_slug']) ?>&slug=<?= htmlspecialchars($discussion['slug']) ?>">
                                <h2 class="fs-400"><?= htmlspecialchars($discussion['title']) ?></h2>
                            </a>
                            <p class="text-neutral-6">
                                <time datetime="<?= htmlspecialchars($discussion['created_at']) ?>">
                                    <?= timeAgo(new DateTime($discussion['created_at'])) ?>
                                </time>
                                by <?= htmlspecialchars($discussion['user_name']) ?> in 
                                <a href="/?category=<?= htmlspecialchars($discussion['category_slug']) ?>" class="[ with-icon ] [ text-blueberry-6 fw-bold ]">
                                    <svg class="icon" style="--space: 0.3em">
                                        <use href="#<?= htmlspecialchars($discussion['category_slug']) ?>"></use>
                                    </svg>
                                    <?= htmlspecialchars($discussion['category_name']) ?>
                                </a>
                            </p>
                        </div>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>

        <?php for ($i = 1; $i <= $metadata->totalPages(); $i++): ?>
            <?php if ($filters->hasCategory()): ?>
                <a href="/?category=<?= $filters->category() ?>&page=<?= $i ?>"><?= $i ?></a>
            <?php else: ?>
                <a href="/?page=<?= $i ?>"><?= $i ?></a>
            <?php endif; ?>
        <?php endfor; ?>
    </div>

    <div class="sidebar">
    </div>
</main>

<?php require base_path('views/partials/foot.php') ?>
