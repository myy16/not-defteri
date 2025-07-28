<?php

use Slim\Factory\AppFactory;

error_reporting(E_ALL);
ini_set('display_errors', 1);

require __DIR__ . '/vendor/autoload.php';

require __DIR__ . '/helpers.php';
require __DIR__ . '/smarty.php';
require __DIR__ . '/controllers/HomeController.php';
require __DIR__ . '/controllers/NotesController.php';

$app = AppFactory::create();

$app->addErrorMiddleware(true, true, true);

$app->addBodyParsingMiddleware();
$app->add(new \Slim\Middleware\MethodOverrideMiddleware());

include 'routes.php';

$app->run();
