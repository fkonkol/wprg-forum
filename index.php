<?php

$discussions = require 'mock_data.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
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
                    <td><?= htmlspecialchars($discussion['category']['name']) ?></td>
                    <td><?= htmlspecialchars($discussion['user']['name']) ?></td>
                    <td><?= htmlspecialchars($discussion['created_at']) ?></td>
                    <td>
                        <a 
                            href="show_discussion.php?slug=<?= htmlspecialchars($discussion['slug']) ?>&category=<?= htmlspecialchars($discussion['category']['slug']) ?>"
                        >
                            Show
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </main>
</body>

</html>
