<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

$app->get('/', function (Request $request, Response $response, $args) {
    $response->getBody()->write("Hello world!");
    return $response;
});

$app->get('/notes', function (Request $request, Response $response, $args) {
    include  'pages/notes.php';
    exit;
});

$app->get('/notes/add', function (Request $request, Response $response, $args) {
    include  'pages/add.php';
    exit;
});

$app->get('/notes/{id}/edit', function (Request $request, Response $response, $args) {
    
    $id = $args['id'] ?? null;

    include  'pages/edit.php';

    exit;
});

