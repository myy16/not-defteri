<?php

require 'smarty.php';

$jsonFile = 'notes.json';
$showSuccessModal = false;

$notes = [];

if (file_exists($jsonFile)) {
    $notes = json_decode(file_get_contents($jsonFile), true);
}

if (!isset($notes[$id])) {
    die("Note Not Found!");
}

$note = $notes[$id];

$title = "Edit Note";

$datas = [
    'title' => "Edit Note",
    'buttons' => [
        [
            'href' => '/notes',
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
