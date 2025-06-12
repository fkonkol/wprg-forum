<?php require base_path('views/partials/head.php') ?>
<?php require base_path('views/partials/navigation.php') ?>

<main class="container">
    <form action="/discussions" method="POST" class="flow">
        <h1>Create a new discussion</h1>

        <div class="grid-flow">
            <label for="discussion_title" class="visually-hidden">Title</label>
            <input type="text" name="title" id="discussion_title" placeholder="Title">
            <?php if (isset($errors['title'])): ?>
                <small><?= e($errors['title']) ?></small>
            <?php endif; ?>
        </div>

        <div class="grid-flow">
            <label for="discussion_body" class="visually-hidden">Body</label>
            <textarea name="body" id="discussion_body" placeholder="Body" rows="4"></textarea>
            <?php if (isset($errors['body'])): ?>
                <small><?= e($errors['body']) ?></small>
            <?php endif; ?>
        </div>

        <div class="grid-flow">
            <label for="discussion_category_id" class="visually-hidden">Category</label>
            <select class="button button--primary button--neutral" name="category_id" id="discussion_category_id">
                <option value="">Select a category</option>
                <?php foreach (Category::all() as $category): ?>
                    <option value="<?= $category->id() ?>"><?= e($category->name()) ?></option>
                <?php endforeach; ?>
            </select>
            <?php if (isset($errors['category_id'])): ?>
                <small><?= e($errors['category_id']) ?></small>
            <?php endif; ?>
        </div>

        <button type="submit" class="button button--primary button--blueberry">Submit</button>
    </form>
</main>

<?php require base_path('views/partials/foot.php') ?>
