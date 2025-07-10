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

<head>
    <meta charset="UTF-8">
    <title>Add Note</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.7/css/bootstrap.min.css" integrity="sha512-fw7f+TcMjTb7bpbLJZlP8g2Y4XcCyFZW8uy8HsRZsH/SwbMw0plKHFHr99DN3l04VsYNwvzicUX/6qurvIxbxw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <div class="header-flex">
            <h1>Add Note</h1>
            <form method="POST">
                <div class="btn-right">
                    <a class="btn btn-primary fw-bold fs-4" href="index.php">Notes</a>
                    <button type="submit" class="btn btn-danger fw-bold fs-4">Save</button>
                </div>
        </div>

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


    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.7/js/bootstrap.min.js" integrity="sha512-zKeerWHHuP3ar7kX2WKBSENzb+GJytFSBL6HrR2nPSR1kOX1qjm+oHooQtbDpDBSITgyl7QXZApvDfDWvKjkUw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</body>

</html>