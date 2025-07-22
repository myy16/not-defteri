<?php

require 'smarty.php';

$notes = [];

if (file_exists('notes.json')) {
    $notes = json_decode(file_get_contents('notes.json'), true);
}

$smarty->assign('notes', $notes);
$smarty->display('pages/dashboard.tpl');
