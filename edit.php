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
        <div class="header-flex">
            <h1>Edit Note</h1>
            <form method="POST">
                <div class="btn-right">
                    <a class="btn btn-primary fw-bold fs-4" href="index.php">Notes</a>
                    <button type="submit" class="btn btn-danger fw-bold fs-4">Save</button>

                </div>
        </div>

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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.7/js/bootstrap.min.js" integrity="sha512-zKeerWHHuP3ar7kX2WKBSENzb+GJytFSBL6HrR2nPSR1kOX1qjm+oHooQtbDpDBSITgyl7QXZApvDfDWvKjkUw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</body>

</html>