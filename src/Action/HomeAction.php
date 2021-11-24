<?php

namespace App\Action;

use Jenssegers\Blade\Blade;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class HomeAction
{
    public function __invoke(Request $request, Response $response): Response {
        $cache = __DIR__ . '/../../cache';
        $views = __DIR__ . '/../../views';
        $blade = (new Blade($views, $cache))->make('auth.home');
        $response->getBody()->write($blade->render());
        return $response;
    }
}
