<?php

$container['db'] = function ($c) {
    $capsule = new \Illuminate\Database\Capsule\Manager;
    $capsule->addConnection($c['settings']['db']);

    $capsule->setAsGlobal();
    $capsule->bootEloquent();

    return $capsule;
};

$container['App\Controllers\MainController'] = function ($c) {
    return new App\Controllers\MainController($c);
};

$container['AuthenticationService'] = function () {
    return new App\Models\Services\AuthenticationService();
};

$container['UploadImageService'] = function () {
    return new App\Models\Services\UploadImageService();
};

$container['CreatePostService'] = function ($c) {
    return new App\Models\Services\Post\CreatePostService($c);
};

$container['UpdatePostService'] = function ($c) {
    return new App\Models\Services\Post\UpdatePostService($c);
};