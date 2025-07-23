<?php

use Slim\Factory\AppFactory;

error_reporting(E_ALL);
ini_set('display_errors', 1);

require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/controllers/NoteController.php';
require __DIR__ . '/controllers/HomeController.php';

$app = AppFactory::create();

$errorMiddleware = $app->addErrorMiddleware(true, true, true);

include 'routes.php';
$app->run();
