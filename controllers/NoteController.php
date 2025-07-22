<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;


class NotesController
{
    public function index(Request $request, Response $response)
    {

        require "smarty.php";
        $notes = [];

        if (file_exists('notes.json')) {
            $notes = json_decode(file_get_contents('notes.json'), true);
        }

        $datas = [
            'title' => "Notes",
            'buttons' => [
                [
                    'type' => 'add',
                    'href' => '/notes/add',
                    'class' => 'btn btn-primary fw-bold fs-3',
                    'text' => '+',
                    'title' => 'Add Note',
                ]
            ]
        ];

        //include '../templates/notes.php';
        $smarty->assign('title', 'Notes');
        $smarty->assign('datas', $datas);
        $smarty->assign('notes', $notes);

        $smarty->display('pages/notes.tpl');

        exit;
    }
}
