<?php require base_path('views/partials/head.php') ?>
<?php require base_path('views/partials/navigation.php') ?>

<dialog id="actions">
    <div class="grid-flow">
        <a href="<?= edit_discussion_path($discussion) ?>" class="button button--secondary button--blueberry">Update</a>
        <?php if (Session::user() && Session::user()->isAdmin()): ?>
        <form action="/discussions" method="post" class="grid-flow">
            <input type="hidden" name="_method" value="delete">
            <input type="hidden" name="id" value="<?= $discussion->id() ?>">
            <button type="submit" class="button button--tertiary button--chili">Delete</button>
        </form>
        <?php endif; ?>
    </div>
</dialog>

<main class="container flow" style="--flow-space: 2rem;">
    <div class="flow">
        <div class="repel">
            <div style="flex: 1; min-width: 0">
                <p class="font-accent text-ellipsis">
                    <a href="/">Discussions</a>
                    &rarr;
                    <a href="/?category=<?= $discussion->category()->slug() ?>">Topic: <?= e($discussion->category()->name()) ?></a>
                    &rarr;
                    <a 
                        href="#" 
                        title="<?= e($discussion->title()) ?>"
                    >
                        <?= e($discussion->title()) ?>
                    </a>
                </p>
            </div>
            <div>
                <?php if (Session::user() && (Session::user()->isModerator() || Session::user()->isAdmin())): ?>
                    <button class="button button--tertiary button--neutral" onclick="document.getElementById('actions').showModal();">Actions</button>
                <?php endif; ?>
            </div>
        </div>

        <div class="flow divide">
            <div class="entry">
                <div>
                    <img src="<?= $discussion->author()->avatarUrl() ?>" alt="Profile picture of <?= e($discussion->author()->name()) ?>" class="avatar">
                </div>
                <div class="flow">
                    <div class="flow" style="--flow-space: 0.5rem;">
                        <h1 class="fs-600"><?= e($discussion->title()) ?></h1>
                        <p class="text-blueberry-6 fw-bold"><?= e($discussion->author()->name()) ?></p>
                    </div>
                    <p class="prose"><?= e($discussion->body()) ?></p>
                    <div class="text-neutral-6">
                        <time datetime="<?= $discussion->createdAt()->format(DateTimeInterface::RFC3339) ?>"><?= time_ago($discussion->createdAt()) ?></time>

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
                        <img src="<?= Session::user() ? Session::user()->avatarUrl() : '/static/img/avatar.png' ?>" alt="Profile picture of <?= e($discussion->author()->name()) ?>" class="avatar">
                    </div>
                    <form action="/comments" method="POST" class="flow" style="--flow-space: 0.5rem;">
                        <input type="hidden" name="discussion_id" value="<?= $discussion->id() ?>">

                        <?php if (!Session::user()): ?>
                            <div class="grid-flow">
                                <label for="guest_name" class="visually-hidden">Username</label>
                                <input type="text" name="guest_name" id="guest_name" placeholder="What's your name?">
                                <?php if (isset($errors['guest_name'])): ?>
                                    <small><?= $errors['guest_name'] ?></small>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>

                        <div class="grid-flow">
                            <label for="body" class="visually-hidden"></label>
                            <textarea name="body" id="body" placeholder="Leave a comment" rows="4"></textarea>
                            <?php if (isset($errors['body'])): ?>
                                <small><?= $errors['body'] ?></small>
                            <?php endif; ?>
                        </div>

                        <button type="submit" class="button button--primary button--blueberry">Comment</button>
                    </form>
                </div>

                <div>
                    <?php foreach($comments as $comment): ?>
                        <article class="entry padding-block-16">
                            <div>
                                <img src="<?= $comment->avatarUrl() ?>" alt="Profile picture of <?= e($comment->username()) ?>" class="avatar">
                            </div>
                            <div class="flow" style="--flow-space: 1rem;">
                                <p class="<?= $comment->isGuest() ? 'text-neutral-6' : 'text-blueberry-6' ?> fw-bold"><?= e($comment->username()) ?></p>
                                <p class="prose">
                                    <?= e($comment->body()) ?>
                                </p>

                                <!-- Bottom bar -->
                                <div class="repel">
                                    <p class="text-neutral-6">
                                        <time datetime="<?= $comment->createdAt()->format(DateTimeImmutable::RFC3339) ?>">
                                            <?= time_ago($comment->createdAt()) ?>
                                        </time>
                                    </p>
                                    <div class="repel">
                                        <?php if (Session::user() && (Session::user()->isModerator() || Session::user()->isAdmin())): ?>
                                            <a href="/comments/edit?id=<?= $comment->id() ?>" class="button button--tertiary button--blueberry">Update</a>
                                        <?php endif; ?>
                                        <?php if (Session::user() && Session::user()->isAdmin()): ?>
                                            <form action="/comments" method="post" class="grid-flow">
                                                <input type="hidden" name="_method" value="delete">
                                                <input type="hidden" name="id" value="<?= $comment->id() ?>">
                                                <button type="submit" class="button button--tertiary button--chili">Delete</button>
                                            </form>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </article>
                    <?php endforeach; ?>
                </div>
            </section>
        </div>
    </div>
</main>

<?php require base_path('views/partials/foot.php') ?>
