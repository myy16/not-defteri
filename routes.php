<?php

$app->get('/', [HomeController::class, 'index']);

$app->get('/notes', [NotesController::class, 'index']);

$app->get('/notes/add', [NotesController::class, 'create']);

$app->post('/notes/add', [NotesController::class, 'store']);

$app->get('/notes/{id}/edit', [NotesController::class, 'edit']);

$app->post('/notes/{id}/edit', [NotesController::class, 'update']);

$app->post('/notes/{id}/delete', [NotesController::class, 'delete']);

$app->delete('/notes', [NotesController::class, 'deleteAll']);