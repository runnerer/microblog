<?php

$app->get('/login', App\Controllers\LoginController::class . ':index');
$app->get('/logout', App\Controllers\LoginController::class . ':logout');
$app->post('/doLogin', App\Controllers\LoginController::class . ':login');