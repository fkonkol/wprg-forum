<?php require base_path('views/partials/head.php') ?>
<?php require base_path('views/partials/navigation.php') ?>

<main class="container with-sidebar flow" style="--flow-space: 2rem;">
    <div class="flow">
        <div class="repel">
            <div style="flex: 1; min-width: 0">
                <p class="font-accent text-ellipsis" style="">
                    <a href="/">Discussions</a>
                    &rarr;
                    <a href="/?category=<?= $discussion->category()->slug() ?>">Topic: <?= htmlspecialchars($discussion->category()->name()) ?></a>
                    &rarr;
                    <a 
                        href="#" 
                        style=";"
                        title="<?= htmlspecialchars($discussion->title()) ?>"
                    >
                        <?= htmlspecialchars($discussion->title()) ?>
                    </a>
                </p>
            </div>
            <button class="button button--secondary button--sunglow">Pin discussion</button>
        </div>

        <div class="flow divide">
            <div class="entry">
                <div>
                    <img src="/static/img/avatar.png" alt="Profile picture of <?= htmlspecialchars($discussion->author()->name()) ?>" class="avatar">
                </div>
                <div class="flow">
                    <div class="flow" style="--flow-space: 0.5rem;">
                        <h1 class="fs-600"><?= htmlspecialchars($discussion->title()) ?></h1>
                        <p class="text-blueberry-6 fw-bold"><?= htmlspecialchars($discussion->author()->name()) ?></p>
                    </div>
                    <p class="prose"><?= htmlspecialchars($discussion->body()) ?></p>
                    <div class="text-neutral-6">
                        <time datetime="<?= htmlspecialchars($discussion->createdAt()) ?>"><?= timeAgo(new DateTime($discussion->createdAt())) ?></time>
                    </div>
                </div>
            </div>

            <!-- Comments -->
            <section>
                <article class="entry padding-block-16">
                    <div>
                        <img src="/static/img/avatar.png" alt="Profile picture of <?= htmlspecialchars($discussion->author()->name()) ?>" class="avatar">
                    </div>
                    <div class="flow" style="--flow-space: 1rem;">
                        <p class="text-blueberry-6 fw-bold">murphy1893</p>
                        <p class="prose">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Minima a blanditiis quibusdam, quisquam nisi explicabo dolore enim id aliquid sequi, eos ut, dicta iure cumque. Accusantium incidunt cum eius adipisci?</p>

                        <!-- Bottom bar -->
                        <p class="text-neutral-6">
                            <time datetime="<?= htmlspecialchars($discussion->createdAt()) ?>">
                                <?= timeAgo(new DateTime($discussion->createdAt())) ?>
                            </time>
                        </p>
                    </div>
                </article>
            </section>
        </div>
    </div>
    <div>
    </div>
</main>

<?php require base_path('views/partials/foot.php') ?>
