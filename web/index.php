<?php

use Slim\Factory\AppFactory as AppFactoryAlias;

require_once __DIR__ . "/../vendor/autoload.php";

$app = AppFactoryAlias::create();
$app->addErrorMiddleware(false, true, false);


$app->run();
