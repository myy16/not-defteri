<?php
$jsonFile = 'notes.json';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $title = trim($_POST['title']);
    $content = trim($_POST['content']);

    if ($title !== '' && $content !== '') {
        $newNote = [
            'title' => htmlspecialchars($title),
            'content' => htmlspecialchars($content),
            'date' => date("Y-m-d H:i:s"),
        ];

        $notes = [];

        if (file_exists('notes.json')) {
            $notes = json_decode(file_get_contents('notes.json'), true) ?? [];
        }
        $newid = array_key_last($notes) + 1;


        $notes[$newid] = $newNote;
        file_put_contents('notes.json', json_encode($notes, JSON_PRETTY_PRINT));
    }
    if ($title === '' || $content === '') {
        $error = "Title and content cannot be empty!";
    } else {

        $notes[$newid] = $newNote;

        file_put_contents($jsonFile, json_encode($notes, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));

        header("Location: index.php");
        exit;
    }
}
?>
<!DOCTYPE html>
<html>

<?php
$title = "Add Note";
include "head.php";
?>

<body>
    <div class="container">

        <?php $header = "Add Note"; ?>
        <?php $currentPage = 'add'; ?>
        <?php $form_id = 'add_form'; ?>
        <?php include "header.php"; ?>

        <form method="POST" id="<?= $form_id ?>">

            <br><br><br><br>
            <?php if (!empty($error)): ?>
                <p style="color:red;"><?php echo htmlspecialchars($error); ?></p>
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

    <?php include "footer.php"; ?>

</body>

</html>