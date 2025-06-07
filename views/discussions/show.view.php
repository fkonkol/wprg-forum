<?php require base_path('views/partials/head.php') ?>
<?php require base_path('views/partials/navigation.php') ?>

<dialog id="actions">
    <div class="grid-flow">
        <form action="/discussions" method="post" class="grid-flow">
            <input type="hidden" name="_method" value="delete">
            <input type="hidden" name="id" value="<?= htmlspecialchars($discussion->id()) ?>">
            <button type="submit" class="button button--primary button--blueberry">Delete</button>
        </form>
    </div>
</dialog>

<main class="container with-sidebar flow" style="--flow-space: 2rem;">
    <div class="flow">
        <div class="repel">
            <div style="flex: 1; min-width: 0">
                <p class="font-accent text-ellipsis">
                    <a href="/">Discussions</a>
                    &rarr;
                    <a href="/?category=<?= $discussion->category()->slug() ?>">Topic: <?= htmlspecialchars($discussion->category()->name()) ?></a>
                    &rarr;
                    <a 
                        href="#" 
                        title="<?= htmlspecialchars($discussion->title()) ?>"
                    >
                        <?= htmlspecialchars($discussion->title()) ?>
                    </a>
                </p>
            </div>
            <div>
                <button class="button button--secondary button--sunglow">Pin discussion</button>
                <button class="button button--secondary button--neutral" onclick="document.getElementById('actions').showModal();">Actions</button>
            </div>
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

                        &middot;

                        <span class="with-icon" style="--space: 0.3em;">
                            <img class="icon" src="/static/img/comments.svg" alt="">
                            <?= $comments_count ?>
                        </span>
                    </div>
                </div>
            </div>

            <!-- Comments -->
            <section class="flow">
                <div class="entry">
                    <div>
                        <img src="/static/img/avatar.png" alt="Profile picture of <?= htmlspecialchars($discussion->author()->name()) ?>" class="avatar">
                    </div>
                    <form action="/comments" method="POST" class="flow" style="--flow-space: 0.5rem;">
                        <input type="hidden" name="discussion_id" value="<?= $discussion->id() ?>">

                        <?php if (!Session::user()): ?>
                            <div>
                                <label for="guest_name" class="visually-hidden">Username</label>
                                <input type="text" name="guest_name" id="guest_name" placeholder="What's your name?">
                            </div>
                        <?php endif; ?>

                        <div>
                            <label for="body" class="visually-hidden"></label>
                            <textarea name="body" id="body" placeholder="Leave a comment" rows="4"></textarea>
                        </div>

                        <button type="submit" class="button button--primary button--blueberry">Comment</button>
                    </form>
                </div>

                <div>
                    <?php foreach($comments as $comment): ?>
                        <article class="entry padding-block-16">
                            <div>
                                <img src="/static/img/avatar.png" alt="Profile picture of <?= htmlspecialchars($comment['user_name']) ?>" class="avatar">
                            </div>
                            <div class="flow" style="--flow-space: 1rem;">
                                <p class="text-blueberry-6 fw-bold"><?= $comment['user_name'] ?? 'Unknown' ?></p>
                                <p class="prose">
                                    <?= $comment['body'] ?>
                                </p>

                                <!-- Bottom bar -->
                                <p class="text-neutral-6">
                                    <time datetime="<?= htmlspecialchars($comment['created_at']) ?>">
                                        <?= timeAgo(new DateTime($comment['created_at'])) ?>
                                    </time>
                                </p>
                            </div>
                        </article>
                    <?php endforeach; ?>
                </div>
            </section>
        </div>
    </div>
    <div>
    </div>
</main>

<?php require base_path('views/partials/foot.php') ?>
