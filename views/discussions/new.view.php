<?php require base_path('views/partials/head.php') ?>
<?php require base_path('views/partials/navigation.php') ?>

<main class="container">
    <form action="/create_discussion" method="POST" class="flow">
        <h1>Create a new discussion</h1>

        <div>
            <label for="discussion_title" class="visually-hidden">Title</label>
            <input type="text" name="title" id="discussion_title" placeholder="Title">
        </div>

        <div>
            <label for="discussion_body" class="visually-hidden">Body</label>
            <textarea name="body" id="discussion_body" placeholder="Body" rows="4"></textarea>
        </div>

        <div>
            <label for="discussion_category_id" class="visually-hidden">Category</label>
            <select class="button button--secondary button--neutral" name="category_id" id="discussion_category_id">
                <option value="">Select a category</option>
                <option value="1">French</option>
                <option value="2">Spanish</option>
            </select>
        </div>

        <button type="submit" class="button button--primary button--blueberry">Submit</button>
    </form>
</main>

<?php require base_path('views/partials/foot.php') ?>
