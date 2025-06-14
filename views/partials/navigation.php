<header>
    <div class="[ padding-32 repel ]">
        <a href="/">
            <img src="/static/img/logo.svg" alt="Logo">
        </a>
        <div class="flex align-center">
            <?php if (Session::user() && Session::user()->isAdmin()): ?>
                <a href="/categories" class="button button--tertiary button--neutral">Admin</a>
            <?php endif; ?>

            <?php if (isset($_SESSION['user'])): ?>
                <form action="/logout" method="POST">
                    <button type="submit" class="button button--tertiary button--neutral">Log out</button>
                </form>
                <a href="/settings">
                    <div>
                        <img src="<?= Session::user()->avatarUrl() ?>" alt="" class="avatar">
                    </div>
                </a>
            <?php else: ?>
                <a href="/login" class="button">Log in</a>
                <a href="/register" class="button button--primary button--blueberry">Sign up</a>
            <?php endif; ?>
        </div>
    </div>
</header>
