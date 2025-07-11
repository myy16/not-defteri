<?php
$notes = [];

if (file_exists('notes.json')) {
    $notes = json_decode(file_get_contents('notes.json'), true);
}

?>
<!DOCTYPE html>
<html>

<?php
$title = "Notes";
include "head.php";
?>

<body>
    <div class="container">
        <div class="header-flex">
            <h1>Notes</h1>
            <div class="text-xl-center mb-3">
                <a class="btn btn-primary fw-bold fs-3" href="add.php">+</a>
            </div>
        </div>
        <div class="notes-container ">

            <?php if (!empty($notes)): ?>
                <?php foreach ($notes as $id => $note): ?>
                    <div class="card mb-3">
                        <div class="card-header d-flex justify-content-between">

                            <div>
                                <?= $note['title'] ?>
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.7/js/bootstrap.min.js" integrity="sha512-zKeerWHHuP3ar7kX2WKBSENzb+GJytFSBL6HrR2nPSR1kOX1qjm+oHooQtbDpDBSITgyl7QXZApvDfDWvKjkUw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</body>

</html>