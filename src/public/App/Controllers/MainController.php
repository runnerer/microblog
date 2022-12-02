<?php

namespace App\Controllers;

use Slim\Container;
use Philo\Blade\Blade;

class MainController {
    protected $container;

    public function __construct(Container $container) {
        $this->container = $container;
    }

    public function __get($var) {
        return $this->container->{$var};
    }

    public static function view($viewName, $data = [], $response) {
        $blade = new Blade(VIEWS_DIR, CACHE_DIR);

        return $response->getBody()->write(
            $blade->view()->make($viewName, $data)->render()
        );
    }

    public static function getErrorResponse($message, $response) {
        return $response->withStatus(400)->withJson([
            'message' => $message
        ]);
    }

    public static function getOkResponse($data = [], $response) {
        return $response->withStatus(200)->withJson($data);
    }

    public static function getRedirectResponse($url, $response) {
        return $response->withRedirect($url);
    }

    public static function getFileResponse($file, $response) {
        $response->write($file);

        return $response->withHeader('Content-Type', FILEINFO_MIME_TYPE);
    }
}