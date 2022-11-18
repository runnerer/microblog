<?php

namespace App\Controllers;

use Slim\Container;
use Philo\Blade\Blade;

class MainController {
    protected $container;

    public function __construct(Container $container)
    {
        $this->container = $container;
    }

    public function __get($var)
    {
        return $this->container->{$var};
    }

    public static function view($viewName, $data = []) {
        $blade = new Blade(VIEWS_DIR, CACHE_DIR);

        echo $blade->view()->make($viewName, $data)->render();
    }

    public static function sendErrorResponse($message) {
        http_response_code(400);

        die(json_encode([
            'message' => $message
        ]));
    }

    public static function send200Response($data = []) {
        http_response_code(200);

        die(json_encode(array_merge([
            'result' => true
        ], $data)));
    }
}