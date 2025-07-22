<?php

$jsonFile = 'notes.json';

$notes = [];
if (file_exists($jsonFile)) {
    $notes = json_decode(file_get_contents($jsonFile), true);
}

$title = trim($_POST['title']);
$content = trim($_POST['content']);

$note = [
    'title' => $title,
    'content' => $content,
    'date' => date('Y-m-d H:i:s'),
];

$notes[$id] = $note;

file_put_contents($jsonFile, json_encode($notes, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));

header('Location: /notes');
exit;
