<?php

$app->get('/login', App\Controllers\LoginController::class . ':index');
$app->get('/logout', App\Controllers\LoginController::class . ':logout');
$app->post('/doLogin', App\Controllers\LoginController::class . ':login');

$app->get('/', App\Controllers\PostController::class . ':index');
$app->post('/posts', App\Controllers\PostController::class . ':create');
$app->post('/posts/{id}', App\Controllers\PostController::class . ':update');

$app->get('/admin', App\Controllers\AdminController::class . ':index');

$app->post('/users', App\Controllers\UserController::class . ':create');

$app->get('/uploads/images/{name}', App\Controllers\ImagesController::class);