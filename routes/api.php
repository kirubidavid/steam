<?php

$app->get('/', function ($request, $response) {
    return $response->withJson(['message' => 'Welcome to Slim!']);
});