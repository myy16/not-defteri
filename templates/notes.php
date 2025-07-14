<!DOCTYPE html>
<html>

<?php include "head.php"; ?>

<body>
    <div class="container">
        <?php include "../header.php"; ?>

        <div class="notes-container ">

            <?php if (!empty($notes)): ?>
                <?php foreach ($notes as $id => $note): ?>
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">

                            <div>
                                <?php echo $note['title'] ?>
                                (<?= $note['date'] ?>)
                            </div>
                            <div class="btn-right">
                                <a class="btn btn-secondary btn-sm me-2" href="edit.php?id=<?= $id ?>">Edit Note</a>
                                <a class="btn btn-danger btn-sm" href="delete.php?id=<?= $id ?>">Delete Note</a>
                            </div>
                        </div>
                        <div class="card-body">
                            <?= nl2br($note['content']) ?>
                        </div>
                    </div>
                <?php endforeach; ?>
        </div>
    </div>

<?php else: ?>
    <p>Do not add yet any note</p>
<?php endif; ?>

<?php include "../footer.php"; ?>

</body>

</html>