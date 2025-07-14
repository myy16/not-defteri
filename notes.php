<?php
$notes = [];

if (file_exists('notes.json')) {
    $notes = json_decode(file_get_contents('notes.json'), true);
}

$title = "Notes";

$datas = [
    'title' => "Notes",
    'currentPage' => 'notes',
    'buttons' => [
        [
            'type' => 'add',
            'href' => 'add.php',
            'class' => 'btn btn-primary fw-bold fs-3',
            'text' => '+',
            'title' => 'Add Note',
        ]
    ]
];

include 'templates/notes.php';
