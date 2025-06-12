<?php require base_path('views/partials/head.php') ?>
<?php require base_path('views/partials/navigation.php') ?>

<main class="container">
    <section class="flow">
        <h1 class="fs-600">Log in</h1>
        <form action="/login" method="POST" class="flow">
            <?php if (isset($errors['login'])): ?>
                <div class="alert"><?= $errors['login'] ?></div>
            <?php endif; ?>
            <div class="grid-flow">
                <label for="username" class="visually-hidden">Username</label>
                <input type="text" name="username" id="username" placeholder="Username">
            </div>
            <div class="grid-flow">
                <label for="password" class="visually-hidden">Password</label>
                <input type="password" name="password" id="password" placeholder="Password">
            </div>
            <button type="submit" class="button button--primary button--blueberry">Log in</button>
        </form>
    </section>
</main>

<?php require base_path('views/partials/foot.php') ?>
