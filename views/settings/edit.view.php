<?php require base_path('views/partials/head.php') ?>
<?php require base_path('views/partials/navigation.php') ?>

<main class="container flow">
    <h1>Settings</h1>

    <div class="flow" style="--flow-space: 0.5rem;">
        <div>
            <img id="preview" src="<?= Session::user()->avatarUrl() ?>" alt="" class="avatar">
        </div>

        <form action="/settings/avatar" method="POST" class="flow" enctype="multipart/form-data">
            <input type="hidden" name="_method" value="put">
            <input type="file" name="avatar" id="avatar">
            <label for="avatar">Select avatar</label>
            <div>
                <button type="submit" class="button button--primary button--blueberry">Save changes</button>
            </div>
        </form>
    </div>

    <form action="/settings" method="POST" class="flow">
        <div>
            <label for="username">Username</label>
            <input type="text" name="username" id="username" placeholder="Username" value="<?= htmlspecialchars(Session::user()->name()) ?>">
        </div>

        <button type="submit" class="button button--primary button--blueberry">Save changes</button>
    </form>
</main>

<script>
    document.querySelector('#avatar').addEventListener('change', (event) => {
        const file = event.target.files[0];
        const preview = document.querySelector('#preview');

        if (file) {
            const reader = new FileReader();
            reader.onload = (e) => preview.src = e.target.result;
            reader.readAsDataURL(file);
        }
    });
</script>

<?php require base_path('views/partials/foot.php') ?>
