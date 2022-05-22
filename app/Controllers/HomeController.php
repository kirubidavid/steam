<?php

namespace App\Controllers;

use Psr\Container\ContainerInterface;
use Slim\Http\Request;
use Slim\Http\Response;

class HomeController 
{

    protected $container;

    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }


    public function getIndex(Request $request,  Response $response)
    {
        return $response->withJson(['message' => 'Welcome to Steam!']);
    }
}