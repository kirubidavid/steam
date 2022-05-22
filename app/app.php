<?php

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__.'../../');
$dotenv->load();

$app = new \Slim\App;

$container = $app->getContainer();

include __DIR__ . '/../routes/api.php';

require_once __DIR__ . '/../configs/database.php';