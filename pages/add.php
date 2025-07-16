<?php
$jsonFile = '../notes.json';
$showSuccessModal = false;

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

        if (file_exists('../notes.json')) {
            $notes = json_decode(file_get_contents('../notes.json'), true) ?? [];
        }
        $newid = array_key_last($notes) + 1;


        $notes[$newid] = $newNote;
        file_put_contents('../notes.json', json_encode($notes, JSON_PRETTY_PRINT));
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
}

$datas = [
    'title' => "Add Note",
    'buttons' => [
        [
            'href' => '../index.php',
            'class' => 'btn btn-primary fw-bold fs-4',
            'text' => 'Notes',
            'title' => 'Back to Notes'
        ],
        [
            'type' => 'submit',
            'form_id' => 'add_form',
            'class' => 'btn btn-danger fw-bold fs-4',
            'text' => 'Save',
            'title' => 'Save Note'
        ]
    ]
];

$form_id = 'add_form';

include '../templates/pages/add.php';
