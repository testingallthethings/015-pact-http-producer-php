<?php

use Slim\Factory\AppFactory as AppFactoryAlias;
use Slim\Psr7\Request;
use Slim\Psr7\Response;

require_once __DIR__ . "/../vendor/autoload.php";

$app = AppFactoryAlias::create();
$app->addErrorMiddleware(false, true, false);

$app->get("/person/{id}", function (Request $request, Response $response, array $args) {
    $body = [
        "first_name" => "Dade",
        "last_name" => "Murphy",
        "alias" => "Zero Cool",
        "age" => 26,
    ];
    $response = $response->withHeader("Content-Type", "application/json");
    $response->getBody()->write(json_encode($body));
    return $response;
});

$app->run();
