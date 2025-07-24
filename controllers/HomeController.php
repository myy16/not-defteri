<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
class HomeController
{
    public function index(Request $request, Response $response, $args)
    {
        global $smarty;

        $page='pages/dashboard.tpl';
        $notes = getnotes();

        $smarty->assign([
            'title' => 'Dashboard',
            'notes' => $notes,
        ]);

        showpage($page);
    }
}
