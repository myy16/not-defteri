<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
class HomeController
{
    public function index(Request $request, Response $response, $args)
    {
        global $smarty;

        $page='pages/dashboard.tpl';

        $notes = [];

        if (file_exists('notes.json')) {
            $notes = json_decode(file_get_contents('notes.json'), true);
        }

        $smarty->assign('title', 'Dashboard');
        $smarty->assign('notes', $notes);


        showpage($page);
    }
}
