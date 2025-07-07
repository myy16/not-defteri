<?php
$notes = [];

// Not kaydetme işlemi
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $title = trim($_POST['title']);
    $content = trim($_POST['content']);

    if ($title !== '' && $content !== '') {
        $newNote = [
            'title' => htmlspecialchars($title),
            'content' => htmlspecialchars($content),
            'date' => date("Y-m-d H:i:s"),
        ];

        if (file_exists('notes.json')) {
            $notes = json_decode(file_get_contents('notes.json'), true);
        }

        $notes[] = $newNote;
        file_put_contents('notes.json', json_encode($notes, JSON_PRETTY_PRINT));
    }
    header("Location:" . $_SERVER['PHP_SELF']);
    exit;
}

// Notları oku
if (file_exists('notes.json')) {
    $notes = json_decode(file_get_contents('notes.json'), true);
}


include 'home.php';
