<?php

$config = [];

require '../vendor/autoload.php';
require 'App/Config/app.php';
require 'App/Config/db.php';

$app = new \Slim\App(['settings' => $config]);

$container = $app->getContainer();

$container['db'] = function ($c) {
    $capsule = new \Illuminate\Database\Capsule\Manager;
    $capsule->addConnection($c['settings']['db']);

    $capsule->setAsGlobal();
    $capsule->bootEloquent();

    return $capsule;
};

require 'App/Config/routes.php';

$app->run();