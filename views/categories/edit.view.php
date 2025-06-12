<?php require base_path('views/partials/head.php') ?>
<?php require base_path('views/partials/navigation.php') ?>

<main class="container">
    <form action="/categories" method="POST" class="flow">
        <h1>Update category</h1>

        <input type="hidden" name="_method" value="put">
        <input type="hidden" name="id" value="<?= $category['id'] ?>">

        <div class="grid-flow">
            <label for="category_name" class="visually-hidden">Name</label>
            <input type="text" name="name" id="category_name" placeholder="Name" value="<?= e($category['name']) ?>">
            <?php if (isset($errors['name'])): ?>
                <small><?= e($errors['name']) ?></small>
            <?php endif; ?>
        </div>

        <div class="grid-flow">
            <label for="category_slug" class="visually-hidden">Slug</label>
            <input type="text" name="slug" id="category_slug" placeholder="Slug" value="<?= e($category['slug']) ?>">
            <?php if (isset($errors['slug'])): ?>
                <small><?= e($errors['slug']) ?></small>
            <?php endif; ?>
        </div>

        <button type="submit" class="button button--primary button--blueberry">Submit</button>
    </form>
</main>

<?php require base_path('views/partials/foot.php') ?>
