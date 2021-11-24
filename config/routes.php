<?php

use Slim\App;

return function (App $app) {
    $app->get('/', \App\Action\HelloWorldAction::class);
    $app->get('/{name}', \App\Action\HelloNameAction::class);
};
