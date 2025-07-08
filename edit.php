<?php
$jsonFile = 'notes.json';
$id = isset($_GET['id']) ? (int)$_GET['id'] : null;

$notes = [];

if (file_exists($jsonFile)) {
    $notes = json_decode(file_get_contents($jsonFile), true);
}

$note = $notes[$id];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $title = trim($_POST['title']);
    $content = trim($_POST['content']);
}
?>


<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <title>Edit Notes</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.7/css/bootstrap.min.css" integrity="sha512-fw7f+TcMjTb7bpbLJZlP8g2Y4XcCyFZW8uy8HsRZsH/SwbMw0plKHFHr99DN3l04VsYNwvzicUX/6qurvIxbxw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <h1>Edit Notes</h1>
        <form method="POST">
            <label for="title" class="form-label">Title:</label>
            <input type="text" name="title" placeholder="Title">

            <label for="content" class="form-label">Note:</label>
            <textarea name="content" placeholder="Content"></textarea>

            <button type="submit" class="btn btn-primary">Submit</button>


        </form>
           <a class="btn btn-primary mt-3" href="index.php">Go Back</a>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.7/js/bootstrap.min.js" integrity="sha512-zKeerWHHuP3ar7kX2WKBSENzb+GJytFSBL6HrR2nPSR1kOX1qjm+oHooQtbDpDBSITgyl7QXZApvDfDWvKjkUw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</body>

</html>