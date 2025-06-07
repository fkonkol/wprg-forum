<div class="[ key-header ] [ repel padding-32 border-radius-2 ] [ bg-primary-50 ]">
    <h1 class="fs-600 text-sunglow-10 text-capitalize">
        <?php if (empty($filters->category())): ?>
            Discussions
        <?php else: ?>
            Discussions: <?= $filters->category() ?>
        <?php endif; ?>
    </h1>
    <a href="/discussions/new" class="button button--primary button--sunglow">Got a question?</a>
</div>
