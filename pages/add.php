<?php

require 'smarty.php';

$jsonFile = 'notes.json';
$showSuccessModal = false;

$datas = [
    'title' => "Add Note",
    'buttons' => [
        [
            'href' => '/notes',
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

$smarty->assign('title', 'Add Note');
$smarty->assign('datas', $datas);
$smarty->assign('showSuccessModal', $showSuccessModal);
$smarty->assign('error', isset($error) ? $error : '');
$smarty->assign('form_id', 'add_form');
$smarty->display('pages/add.tpl');
