<?php

use App\Controllers\HomeController;
use App\Controllers\UserController;

$app->get('/', HomeController::class. ':getIndex');

$app->group('/api', function () use ($app) {

    $app->post('/account-create', UserController::class. ':postCreateAccount');
});