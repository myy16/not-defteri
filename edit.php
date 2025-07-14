<?php
$jsonFile = 'notes.json';
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

        file_put_contents($jsonFile, json_encode($notes, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));

        header("Location: index.php");
        exit;
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

        <form method="POST" id="<?= $form_id ?>">
            <?php if (!empty($error)): ?>
                <p style="color:red;"><?php echo htmlspecialchars($error); ?></p>
            <?php endif; ?>


            <br><br><br><br>
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

    </form>

    <?php include "footer.php"; ?>

</body>

</html>