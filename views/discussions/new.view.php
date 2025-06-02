<?php require base_path('views/partials/head.php') ?>

<h1>Create a new discussion</h1>

<form action="/create_discussion" method="POST">
    <p>
        <label for="discussion_title">Title</label>
        <input type="text" name="title" id="discussion_title">
    </p>

    <p>
        <label for="discussion_body">Body</label>
        <textarea name="body" id="discussion_body"></textarea>
    </p>

    <p>
        <label for="discussion_category_id">Category</label>
        <select name="category_id" id="discussion_category_id">
            <option value="">Select a category</option>
            <option value="1">French</option>
            <option value="2">Spanish</option>
        </select>
    </p>

    <p>
        <button type="submit">Submit</button>
    </p>
</form>

<?php require base_path('views/partials/foot.php') ?>
