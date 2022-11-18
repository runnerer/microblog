<?php

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

$app->add(function (Request $request, Response $response, callable $next) {

$public = array(
   '/'
);

$restricted = array(
    'admin'
);

$uriSegments = explode("/", parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));

$routeName = $uriSegments[1];

if (in_array($routeName, $restricted)) {
    session_start();

    if (!isset($_SESSION['user'])) {
        return $response->withRedirect('/login');

    }

    return $next($request, $response);
}

return $next($request, $response);
});