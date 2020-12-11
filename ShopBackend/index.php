<?php
use Slim\Factory\AppFactory;
use DI\Container;
use Psr\Container\ContainerInterface;
use Slim\Exception\NotFoundException;


require __DIR__ . '/vendor/autoload.php';

require 'src/Infrastructure/DependencyInjection.php';

Global $app;
$app = AppFactory::createFromContainer($container);

$app->options('/{routes:.+}', function ($request, $response, $args) {
    return $response;
});

$app->add(function ($request, $handler) {
    $response = $handler->handle($request);
    return $response
            ->withHeader('Content-Type', 'application/json')
            ->withHeader('Access-Control-Allow-Origin', '*')
            ->withHeader('Access-Control-Expose-Headers', '*')
            ->withHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization')
            ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, PATCH');
});


$app->addBodyParsingMiddleware();
$app->addRoutingMiddleware();
$app->addErrorMiddleware(true, true, true);

require 'src/API/JwtConfig.php' ;
$app->add($jwt);
require 'src/API/routes.php' ;

$app->run();