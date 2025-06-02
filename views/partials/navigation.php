<header>
    <div class="[ padding-32 repel ]">
        <a href="/">
            <img src="/static/img/logo.svg" alt="Logo">
        </a>
        <div>
            <?php if (isset($_SESSION['user'])): ?>
                <form action="/logout" method="POST">
                    <button type="submit" class="button button--secondary button--sunglow">Log out</button>
                </form>
            <?php else: ?>
                <a href="/login" class="button">Log in</a>
                <a href="/register" class="button button--primary button--blueberry">Sign up</a>
            <?php endif; ?>
        </div>
    </div>
</header>