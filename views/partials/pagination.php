<?php if (isset($metadata) && isset($filters)): ?>
    <section class="pagination">
        <?php if ($metadata->hasPreviousPage()): ?>
            <?php if ($filters->hasCategory()): ?>
                <a class="button button--primary button--neutral" href="/?category=<?= $filters->category() ?>&page=<?= $metadata->currentPage() - 1 ?>">
                    &larr;
                </a>
            <?php else: ?>
                <a class="button button--primary button--neutral" href="/?page=<?= $metadata->currentPage() - 1 ?>">
                    &larr;
                </a>
            <?php endif; ?>
        <?php endif; ?>

        <span class="fs-400 font-accent">
            <?= $metadata->currentPage() ?>
        </span>

        <?php if ($metadata->hasNextPage()): ?>
            <?php if ($filters->hasCategory()): ?>
                <a class="button button--primary button--neutral" href="/?category=<?= $filters->category() ?>&page=<?= $metadata->currentPage() + 1 ?>">
                    &rarr;
                </a>
            <?php else: ?>
                <a class="button button--primary button--neutral" href="/?page=<?= $metadata->currentPage() + 1 ?>">
                    &rarr;
                </a>
            <?php endif; ?>
        <?php endif; ?>
    </section>
<?php endif; ?>