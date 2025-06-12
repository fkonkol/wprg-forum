<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?php if (isset($title)): ?>
            <?= htmlspecialchars($title) ?> &middot; WPRGApp
        <?php else: ?>
            WPRGApp
        <?php endif; ?>
    </title>
    <link rel="stylesheet" href="/static/css/main.css">
</head>
<body>
