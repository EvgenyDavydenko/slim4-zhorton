<?php

namespace App\Action;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class HelloNameAction
{
    public function __invoke(Request $request, Response $response, array $args): Response {
        $name = $args['name'];
        $response->getBody()->write("Hello, $name");
        return $response;
    }
}
