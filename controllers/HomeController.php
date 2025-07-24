<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class HomeController
{
    public function index(Request $request, Response $response, $args)
    {
        showpage('pages/dashboard.tpl', [
            'title' => 'Dashboard',
            'notes' => getnotes(),
        ]);
    }
}
