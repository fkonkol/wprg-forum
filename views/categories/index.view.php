<?php require base_path('views/partials/head.php') ?>
<?php require base_path('views/partials/navigation.php') ?>

<main class="container">
    <div class="flow" style="--flow-space: 2.5rem;">
        <h1>Manage categories</h1>

        <table>
            <tr>
                <th>Name</th>
                <th>Slug</th>
                <th>Actions</th>
            </tr>
            <?php foreach ($categories as $category): ?>
                <tr>
                    <td><?= e($category['name']) ?></td>
                    <td><?= e($category['slug']) ?></td>
                    <td class="flex align-center">
                        <a class="button button--tertiary button--neutral" href="/categories/edit?id=<?= $category['id'] ?>">Edit</a>
                        <form action="/categories" method="post">
                            <input type="hidden" name="_method" value="delete">
                            <input type="hidden" name="id" value="<?= $category['id'] ?>">
                            <button type="submit" class="button button--tertiary button--chili">Delete</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>

        <a href="/categories/new" class="button button--primary button--sunglow">Add a new category</a>
    </div>
</main>

<?php require base_path('views/partials/foot.php') ?>
