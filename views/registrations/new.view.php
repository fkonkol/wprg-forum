<?php require base_path('views/partials/head.php') ?>
<?php require base_path('views/partials/navigation.php') ?>

<main class="container">
    <section class="flow">
        <h1 class="fs-600">Sign up</h1>
        <form action="/register" method="POST" class="flow">
            <div class="grid-flow">
                <label for="username" class="visually-hidden">Username</label>
                <input type="text" name="username" id="username" placeholder="Username">
                <?php if (isset($errors['username'])): ?>
                    <small><?= $errors['username'] ?></small>
                <?php endif; ?>
            </div>
            <div class="grid-flow">
                <label for="password" class="visually-hidden">Password</label>
                <input type="password" name="password" id="password" placeholder="Password">
                <?php if (isset($errors['password'])): ?>
                    <small><?= $errors['password'] ?></small>
                <?php endif; ?>
            </div>
            <button type="submit" class="button button--primary button--blueberry">Sign up</button>
        </form>
    </section>
</main>

<?php require base_path('views/partials/foot.php') ?>
