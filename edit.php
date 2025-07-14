<?php
$jsonFile = 'notes.json';
$showSuccessModal = false;
$id = isset($_GET['id']) ? (int)$_GET['id'] : null;

$notes = [];

if (file_exists($jsonFile)) {
    $notes = json_decode(file_get_contents($jsonFile), true);
}

if (!isset($notes[$id])) {
    die("Note Not Found!");
}

$note = $notes[$id];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $title = trim($_POST['title']);
    $content = trim($_POST['content']);

    if ($title === '' || $content === '') {
        $error = "Title and content cannot be empty!";
    } else {

        $notes[$id]['title'] = $title;
        $notes[$id]['content'] = $content;

        if (file_put_contents($jsonFile, json_encode($notes, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE))) {
            $showSuccessModal = true;
        } else {
            $error = "An error occurred while saving the note.";
        }
    }
}
?>


<!DOCTYPE html>
<html lang="tr">

<?php
$title = "Edit Note";
include "head.php";
?>

<body>
    <div class="container">

        <?php

        $datas = [
            'title' => "Edit Note",
            'buttons' => [
                [
                    'href' => 'index.php',
                    'class' => 'btn btn-primary fw-bold fs-4',
                    'text' => 'Notes',
                    'title' => 'Back to Notes'
                ],
                [
                    'type' => 'submit',
                    'form_id' => 'edit_form',
                    'class' => 'btn btn-danger fw-bold fs-4',
                    'text' => 'Save',
                    'title' => 'Save Note'
                ]
            ]
        ];

        $form_id = 'edit_form';
        include "header.php" ?>

        <br><br><br><br>
        <form method="POST" id="<?= $form_id ?>">
            <?php if (!empty($error)): ?>
                <div class="alert alert-danger">
                    <?php echo htmlspecialchars($error); ?>
                </div>
            <?php endif; ?>

            <?php if ($showSuccessModal): ?>
                <div class="alert alert-success text-center">
                    <h5> ✅ Successfully!</h5>
                    Your note updated!
                </div>
            <?php endif; ?>

            <div class="mb-3">
                <label for="title" class="form-label">Title:</label>
                <input name='title' type="text" class="form-control" id="title" value="<?php echo htmlspecialchars($note['title']); ?>" placeholder="Title">
            </div>
            <br>
            <div class="mb-3">
                <label for="content" class="form-label">Note:</label>
                <textarea name="content" class="form-control" id="content" rows="3" placeholder="Content"><?php echo htmlspecialchars($note['content']); ?></textarea>
            </div>
        </form>
    </div>

    <?php include "footer.php"; ?>

</body>

</html>