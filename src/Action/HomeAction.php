<?php

namespace App\Action;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class HomeAction
{
    public function __invoke(Request $request, Response $response): Response {
        $name = 'Clean Code Studio';        
        return view($response, 'auth.home', compact('name'));
    }
}
