<?php

session_start();

define("VIEWS_DIR", __DIR__ . '/App/Views');
define("CACHE_DIR", __DIR__ . '/App/Views/Cache');
define("IMAGES_DIR", __DIR__ . '/Uploads/Images');

$config = [];

require '../vendor/autoload.php';
require 'App/Config/app.php';
require 'App/Config/db.php';

$app = new \Slim\App(['settings' => $config]);

$container = $app->getContainer();

require 'App/Config/dependencies.php';
require 'App/Middleware/AuthMiddleware.php';
require 'App/Config/routes.php';

$app->run();