<?php require 'partials/head.php' ?>

<main>
    <h1>Discussions</h1>
    <table>
        <tr>
            <th>Title</th>
            <th>Slug</th>
            <th>Category</th>
            <th>Creator</th>
            <th>Created at</th>
        </tr>
        <?php foreach ($discussions as $discussion): ?>
            <tr>
                <td><?= htmlspecialchars($discussion['title']) ?></td>
                <td><?= htmlspecialchars($discussion['slug']) ?></td>
                <td><?= htmlspecialchars($discussion['category_name']) ?></td>
                <td><?= htmlspecialchars($discussion['user_name']) ?></td>
                <td><?= htmlspecialchars($discussion['created_at']) ?></td>
                <td>
                    <a 
                        href="show_discussion?slug=<?= htmlspecialchars($discussion['slug']) ?>&category=<?= htmlspecialchars($discussion['category_slug']) ?>"
                    >
                        Show
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</main>

<?php require 'partials/foot.php' ?>
