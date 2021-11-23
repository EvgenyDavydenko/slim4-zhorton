<?php
use DI\Container;
use Slim\Factory\AppFactory;

require __DIR__ . '/../vendor/autoload.php';

// Create Container using PHP-DI
$container = new Container();

$settings = require __DIR__ . '/../config/settings.php';
$settings($container);

// Set container to create App with on AppFactory
AppFactory::setContainer($container);

// Instantiate app
$app = AppFactory::create();

// Add Error Handling Middleware
$middleware = require __DIR__ . '/../config/middleware.php';
$middleware($app);

// Add route callbacks
$app->get('/', App\Action\HelloWorldAction::class);
$app->get('/{name}', App\Action\HelloNameAction::class);

// Run application
$app->run();