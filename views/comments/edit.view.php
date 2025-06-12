<?php require base_path('views/partials/head.php') ?>
<?php require base_path('views/partials/navigation.php') ?>

<main class="container">
    <form action="/comments" method="POST" class="flow">
        <h1>Update comment</h1>

        <input type="hidden" name="_method" value="put">
        <input type="hidden" name="id" value="<?= $comment->id() ?>">

        <?php if ($comment->isGuest()): ?>
            <div class="grid-flow">
                <label for="comment_guest_name" class="visually-hidden">Guest name</label>
                <input type="text" name="guest_name" id="comment_guest_name" placeholder="Guest name" value="<?= e($comment->username()) ?>">
                <?php if (isset($errors['guest_name'])): ?>
                    <small><?= e($errors['guest_name']) ?></small>
                <?php endif; ?>
            </div>
        <?php endif; ?>

        <div class="grid-flow">
            <label for="comment_body" class="visually-hidden">Body</label>
            <textarea name="body" id="comment_body" placeholder="Body" rows="4"><?= e($comment->body()) ?></textarea>
            <?php if (isset($errors['body'])): ?>
                <small><?= e($errors['body']) ?></small>
            <?php endif; ?>
        </div>

        <button type="submit" class="button button--primary button--blueberry">Submit</button>
    </form>
</main>

<?php require base_path('views/partials/foot.php') ?>
