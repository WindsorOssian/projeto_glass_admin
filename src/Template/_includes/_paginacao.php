<div class="pagination">
    <?php for ($i = 1; $i <= $totalPages; $i++) { ?>
        <a href="?page=<?= $i ?>"
            class="<?= $i == $currentPage ? 'active' : '' ?>">
            <?= $i ?>
        </a>
    <?php } ?>
</div>