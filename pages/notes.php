<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);
// put full path to Smarty.class.php
require __DIR__ . '/../vendor/autoload.php'; // Adjust the path as necessary
$smarty = new Smarty\Smarty();

$smarty->setTemplateDir('../templates');
$smarty->setCompileDir('../templates_c');
// $smarty->setCacheDir('/web/www.example.com/smarty/cache');
// $smarty->setConfigDir('/web/www.example.com/smarty/configs');



$notes = [];

if (file_exists('../notes.json')) {
    $notes = json_decode(file_get_contents('../notes.json'), true);
}

$datas = [
    'title' => "Notes",
    'currentPage' => 'notes',
    'buttons' => [
        [
            'type' => 'add',
            'href' => 'pages/add.php',
            'class' => 'btn btn-primary fw-bold fs-3',
            'text' => '+',
            'title' => 'Add Note',
        ]
    ]
];

//include '../templates/notes.php';
$smarty->assign('title','Notes');
$smarty->assign('datas', $datas);
$smarty->assign('notes', $notes);
$smarty->display('notes.tpl');