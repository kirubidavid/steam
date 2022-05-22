<?php

$connection = [
    'driver' => 'sqlite',
    'database' => __DIR__ . '/../database/steam.sqlite',    
];

$capsule = new \Illuminate\Database\Capsule\Manager;
$capsule->addConnection($connection);
$capsule->setAsGlobal();
$capsule->bootEloquent();

return $capsule;

