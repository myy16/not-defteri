<!DOCTYPE html>
<html>

<?php include "../head.php"; ?>

<body>
    <div class="container">

        <?php include "../header.php"; ?>

        <form method="POST" id="<?= $form_id ?>">

            <br><br><br><br>
            <?php if (!empty($error)): ?>
                <div class="alert alert-danger">
                    <?php echo htmlspecialchars($error); ?>
                </div>
            <?php endif; ?>

            <?php if ($showSuccessModal): ?>
                <div class="alert alert-success text-center">
                    <h5>✅ Successfully!</h5>
                    Your note added!
                </div>
            <?php endif; ?>

            <div class="mb-3">
                <label for="title" class="form-label">Title:</label>
                <input name='title' type="text" class="form-control" id="title" placeholder="To do..">
            </div>
            <div class="mb-3">
                <label for="content" class="form-label">Note:</label>
                <textarea name='content' class="form-control" id="content" rows="3" placeholder="buy ticket,go shopping..."></textarea>
            </div>
        </form>
    </div>

    <?php include "../footer.php"; ?>

</body>

</html>