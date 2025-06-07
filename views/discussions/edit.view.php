<?php require base_path('views/partials/head.php') ?>
<?php require base_path('views/partials/navigation.php') ?>

<main class="container">
    <form action="/discussions" method="POST" class="flow">
        <h1>Update discussion</h1>

        <input type="hidden" name="_method" value="put">
        <input type="hidden" name="id" value="<?= $discussion->id() ?>">

        <div>
            <label for="discussion_title" class="visually-hidden">Title</label>
            <input type="text" name="title" id="discussion_title" placeholder="Title" value="<?= htmlspecialchars($discussion->title()) ?>">
        </div>

        <div>
            <label for="discussion_body" class="visually-hidden">Body</label>
            <textarea name="body" id="discussion_body" placeholder="Body" rows="4"><?= htmlspecialchars($discussion->body()) ?></textarea>
        </div>

        <div>
            <label for="discussion_category_id" class="visually-hidden">Category</label>
            <select class="button button--primary button--neutral" name="category_id" id="discussion_category_id">
                <option value="">Select a category</option>
                <option value="1" <?= $discussion->category()->id() === 1 ? 'selected' : '' ?>>French</option>
                <option value="2" <?= $discussion->category()->id() === 2 ? 'selected' : '' ?>>Spanish</option>
            </select>
        </div>

        <button type="submit" class="button button--primary button--blueberry">Submit</button>
    </form>
</main>

<?php require base_path('views/partials/foot.php') ?>
