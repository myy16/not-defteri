<?php

function showpage($page, array $vars)
{
    global $smarty;

    $smarty->assign($vars);
    $smarty->display($page);

    exit;
}
function getnotes()
{
    $notes = [];

    if (file_exists('notes.json')) {
        $notes = json_decode(file_get_contents('notes.json'), true);
    }

    return $notes;
}
