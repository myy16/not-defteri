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

    // add 

    public function create(Request $request, Response $response)
    {
        require 'smarty.php';

        $jsonFile = 'notes.json';
        $showSuccessModal = false;

        $datas = [
            'title' => "Add Note",
            'buttons' => [
                [
                    'href' => '/notes',
                    'class' => 'btn btn-primary fw-bold fs-4',
                    'text' => 'Notes',
                    'title' => 'Back to Notes'
                ],
                [
                    'type' => 'submit',
                    'form_id' => 'add_form',
                    'class' => 'btn btn-danger fw-bold fs-4',
                    'text' => 'Save',
                    'title' => 'Save Note'
                ]
            ]
        ];

        $form_id = 'add_form';

        $smarty->assign('title', 'Add Note');
        $smarty->assign('datas', $datas);
        $smarty->assign('showSuccessModal', $showSuccessModal);
        $smarty->assign('error', isset($error) ? $error : '');
        $smarty->assign('form_id', 'add_form');

        $smarty->display('pages/add.tpl');
    }

    // add_post

    public function store(Request $request, Response $response)
    {


        $jsonFile = 'notes.json';
        $showSuccessModal = false;

        $title = trim($_POST['title']);
        $content = trim($_POST['content']);

        if ($title !== '' && $content !== '') {
            $newNote = [
                'title' => htmlspecialchars($title),
                'content' => htmlspecialchars($content),
                'date' => date("Y-m-d H:i:s"),
            ];

            $notes = [];

            if (file_exists('notes.json')) {
                $notes = json_decode(file_get_contents('notes.json'), true) ?? [];
            }
            $newid = array_key_last($notes) + 1;


            $notes[$newid] = $newNote;
            file_put_contents('notes.json', json_encode($notes, JSON_PRETTY_PRINT));
        }
        if ($title === '' || $content === '') {
            $error = "Title and content cannot be empty!";
        } else {

            $notes[$newid] = $newNote;

            if (file_put_contents($jsonFile, json_encode($notes, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE))) {
                $showSuccessModal = true;
            } else {
                $error = "An error occurred while saving the note.";
            }
        }

        $form_id = 'add_form';

        header('Location: /notes');
        exit;
    }
}
