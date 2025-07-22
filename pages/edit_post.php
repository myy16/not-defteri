<?php

$jsonFile = 'notes.json';
$showSuccessModal = false;

$notes = [];
if (file_exists($jsonFile)) {
    $notes = json_decode(file_get_contents($jsonFile), true);
}

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

$title = "Edit Note";

$form_id = 'edit_form';

header('Location: /notes');
exit;
