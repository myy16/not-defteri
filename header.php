<div class="header-flex">
    <h1><?php echo $header; ?></h1>

    <div class="btn-right">
        <?php if ($currentPage == 'notes'): ?>
            <a class="btn btn-primary fw-bold fs-3" href="add.php" title="Add Note" data-bs-toggle="tooltip" data-bs-placement="bottom">+</a>
        <?php else: ?>
            <a class="btn btn-primary fw-bold fs-4" href="index.php">Notes</a>
            <button type="submit" class="btn btn-danger fw-bold fs-4" form="<?php echo $form_id ?>">Save</button>
        <?php endif; ?>
    </div>

</div>