<?php

require '../smarty.php';

$jsonFile = '../notes.json';
$showSuccessModal = false;
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

        if (file_put_contents($jsonFile, json_encode($notes, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE))) {
            $showSuccessModal = true;
        } else {
            $error = "An error occurred while saving the note.";
        }
    }
}
$title = "Edit Note";

$datas = [
    'title' => "Edit Note",
    'buttons' => [
        [
            'href' => '../index.php',
            'class' => 'btn btn-primary fw-bold fs-4',
            'text' => 'Notes',
            'title' => 'Back to Notes'
        ],
        [
            'type' => 'submit',
            'form_id' => 'edit_form',
            'class' => 'btn btn-danger fw-bold fs-4',
            'text' => 'Save',
            'title' => 'Save Note'
        ]
    ]
];

$form_id = 'edit_form';

$smarty->assign('form_id', $form_id);
$smarty->assign('note', $note);
$smarty->assign('datas', $datas);
$smarty->assign('showSuccessModal', $showSuccessModal);
$smarty->assign('error', isset($error) ? $error : '');
$smarty->assign('title', 'Edit Note');
$smarty->display('pages/edit.tpl');
