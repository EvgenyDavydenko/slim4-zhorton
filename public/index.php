<?php
use DI\Container;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;

require __DIR__ . '/../vendor/autoload.php';

// Create Container using PHP-DI
$container = new Container();

$container->set('settings', function () {
    return [
        'displayErrorDetails' => true,
        'logErrorDetails' => false,
        'logErrors' => false,
    ];
});

// Set container to create App with on AppFactory
AppFactory::setContainer($container);

// Instantiate app
$app = AppFactory::create();

// Add Error Handling Middleware
$setting = $app->getContainer()->get('settings');
$app->addErrorMiddleware(
    $setting['displayErrorDetails'],
    $setting['logErrors'],
    $setting['logErrorDetails']
);

// Add route callbacks
$app->get('/', function (Request $request, Response $response, array $args) {
    $response->getBody()->write('Hello, World!');
    return $response;
});

$app->get('/{name}', function (Request $request, Response $response, array $args) {
    $name = $args['name'];
    $response->getBody()->write("Hello, $name");
    return $response;
});

// Run application
$app->run();