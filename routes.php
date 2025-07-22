<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

$app->get('/', function (Request $request, Response $response, $args) {
    include  'pages/dashboard.php';
    exit;
});

$app->get('/notes', NotesController::class . ':index');

// $app->get('/notes/add', function (Request $request, Response $response, $args) {
//     include  'pages/add.php';
//     exit;
// });
// $app->post('/notes/add', function (Request $request, Response $response, $args) {
//     include  'pages/add_post.php';
//     exit;
// });

// $app->get('/notes/{id}/edit', function (Request $request, Response $response, $args) {
//     $id = $args['id'] ?? null;
//     include  'pages/edit.php';
//     exit;
// });

// $app->post('/notes/{id}/edit', function (Request $request, Response $response, $args) {
//     $id = $args['id'] ?? null;
//     include  'pages/editpost.php';
//     exit;
// });

// $app->post('/notes/{id}/delete', function (Request $request, Response $response, $args) {
//     $id = $args['id'] ?? null;
//     include  'pages/delete.php';
//     exit;
// });
