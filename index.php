<?php

$discussions = [
    [
        'id' => 1,
        'title' => 'What is the difference between "connaître" and "savoir"?',
        'slug' => 'what-is-the-difference-between-connaitre-and-savoir-1',
        'user' => [
            'id' => 1,
            'name' => 'lech_roch_pawlak',
        ],
        'category' => [
            'id' => 1,
            'slug' => 'french',
            'name' => 'French',
        ],
        'created_at' => '2025-05-31T12:00:00',
    ],
    [
        'id' => 2,
        'title' => 'What does "coup de main" mean?',
        'slug' => 'what-does-coup-de-main-mean-2',
        'user' => [
            'id' => 2,
            'name' => 'muran',
        ],
        'category' => [
            'id' => 1,
            'slug' => 'french',
            'name' => 'French',
        ],
        'created_at' => '2025-05-30T12:00:00',
    ],
];

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
                </tr>
            <?php endforeach; ?>
        </table>
    </main>
</body>

</html>
