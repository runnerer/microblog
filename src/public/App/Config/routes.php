<?php

$app->get('/login', App\Controllers\LoginController::class . ':index');
$app->get('/logout', App\Controllers\LoginController::class . ':logout');
$app->post('/doLogin', App\Controllers\LoginController::class . ':login');

$app->get('/', App\Controllers\PostController::class . ':index');
$app->post('/posts', App\Controllers\PostController::class . ':create');
$app->post('/posts/{id}', App\Controllers\PostController::class . ':update');

$app->get('/uploads/images/{name}', function($request, $response, $args) {
    $image = @file_get_contents(__DIR__ . '/Uploads/Images/'. $args['name']);

    if ($image !== FALSE) {
        $response->write($image);

        return $response->withHeader('Content-Type', FILEINFO_MIME_TYPE);
    }
});