<?php

namespace Test;

use PHPUnit\Framework\TestCase as BaseTestCase;

class TestCase extends BaseTestCase{

    public function createApplication()
    {
        $app = new \Slim\App;
        $container = $app->getContainer();
        $app->loadEnvironmentFrom('.env.testing');
        include __DIR__ . '/../routes/api.php';
        return $app;
    }


    public function setUp() : void
    {
        parent::setUp();
    }

    public function tearDown() : void
    {
        parent::tearDown();
    }

}