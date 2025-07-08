<?php
$id = $_GET['id'] ?? null;

$notes = [];

if (file_exists('notes.json')) {
    $notes = json_decode(file_get_contents('notes.json'), true);
}


if (isset($notes[$id])) {
    unset($notes[$id]);
    file_put_contents('notes.json', json_encode($notes, JSON_PRETTY_PRINT));
    
}
header("Location: index.php");
exit;
