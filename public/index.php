<?php

require __DIR__. '/../vendor/autoload.php';

$app = new \Slim\App;

$container = $app->getContainer();

include __DIR__ . '/../routes/api.php';

$app->run();