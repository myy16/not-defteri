<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class NotesController
{
    public function index(Request $request, Response $response)
    {
        showpage('pages/notes.tpl', [
            'title' => 'Notes',
            'notes' => getnotes(),
            'datas' =>  [
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
            ],
        ]);
    }

    // add 
    public function create(Request $request, Response $response)
    {
        showpage('pages/add.tpl', [
            'title' => 'Add Note',
            'form_id' => 'add_form',
            'error' => isset($error) ? $error : '',
            'datas' => [
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
            ],
        ]);
    }

    // add_post
    public function store(Request $request, Response $response)
    {
        $title = trim($_POST['title']);
        $content = trim($_POST['content']);
        $isdatavalid = !empty($title) && !empty($content);

        if ($isdatavalid) {
            $newNote = [
                'title' => $title,
                'content' => $content,
                'date' => date("Y-m-d H:i:s"),
            ];
            $notes = getnotes();
            $newid = array_key_last($notes) + 1;
            $notes[$newid] = $newNote;
            file_put_contents('notes.json', json_encode($notes, JSON_PRETTY_PRINT));
        }

        header('Location: /notes');
        exit;
    }

    // edit
    public function edit(Request $request, Response $response, $args)
    {
        $notes = getnotes();
        $id = $args['id'] ?? null;
        $note = $notes[$id];

        if (!isset($note)) {
            die("Note Not Found!");
        }

        showpage('pages/edit.tpl', [
            'note' => $note,
            'form_id' => 'edit_form',
            'title' => 'Edit Note',
            'datas' => [
                'title' => "Edit Note",
                'buttons' => [
                    [
                        'href' => '/notes',
                        'class' => 'btn btn-primary fw-bold fs-4',
                        'text' => 'Notes',
                        'title' => 'Back to Notes'
                    ],
                    [
                        'type' => 'submit',
                        'form_id' => 'edit_form',
                        'class' => 'btn btn-danger fw-bold fs-4',
                        'text' => 'Save',
                        'title' => 'Save Note'
                    ]
                ]
            ],

        ]);
    }

    // edit_post
    public function update(Request $request, Response $response, $args)
    {
        $id = $args['id'] ?? null;
        $notes = getnotes();
        $title = trim($_POST['title']);
        $content = trim($_POST['content']);
        $note = [
            'title' => $title,
            'content' => $content,
            'date' => date('Y-m-d H:i:s'),
        ];
        $notes[$id] = $note;

        file_put_contents('notes.json', json_encode($notes, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));

        header('Location: /notes');
        exit;
    }

    // delete_post
    public function delete(Request $request, Response $response, $args)
    {
        $notes = getnotes();
        $id = $args['id'] ?? null;

        if (isset($notes[$id])) {
            unset($notes[$id]);
            file_put_contents('notes.json', json_encode($notes, JSON_PRETTY_PRINT));
        }

        header("Location: /notes");
        exit;
    }

    // delete_all

    public function deleteAll(Request $request, Response $response)
    {
        $jsonFilePath = 'notes.json';

        if (file_exists($jsonFilePath)) {
            file_put_contents($jsonFilePath, json_encode([]));
        }

        header("Location: /notes");
        exit;
    }
}
