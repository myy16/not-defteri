<?php

$jsonFile = 'notes.json';
$showSuccessModal = false;

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

    if (file_put_contents($jsonFile, json_encode($notes, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE))) {
        $showSuccessModal = true;
    } else {
        $error = "An error occurred while saving the note.";
    }
}

$form_id = 'add_form';

header('Location: /notes');
exit;
