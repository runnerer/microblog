<?php

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

$app->add(function (Request $request, Response $response, callable $next) {

$restricted = array(
    '/admin'
);

$routeName = $request->getUri()->getPath();

if (in_array($routeName, $restricted)) {
    if (!isset($_SESSION['user'])) {
        return $response->withRedirect('/login');

    }

    return $next($request, $response);
}

return $next($request, $response);
});