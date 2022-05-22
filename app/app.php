<?php

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__.'../../');
$dotenv->load();

$app = new \Slim\App;

$container = $app->getContainer();

include __DIR__ . '/../routes/api.php';