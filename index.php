<?php

use Slim\Factory\AppFactory;

error_reporting(E_ALL);
ini_set('display_errors', 1);

require "smarty.php";

require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/controllers/NotesController.php';
require __DIR__ . '/controllers/HomeController.php';

$app = AppFactory::create();

$errorMiddleware = $app->addErrorMiddleware(true, true, true);

include 'routes.php';
$app->run();

function showpage($page)
{
    global $smarty;

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
