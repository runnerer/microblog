<?php

namespace Tests\Functional;
use PHPUnit\Framework\TestCase;
use Slim\App;
use Slim\Http\Request;
use Slim\Http\Response;
use Slim\Http\Environment;

class BaseTestCase extends TestCase {
    public function runApp($requestMethod, $requestUri, $requestData = []) {
        $enviroment = Environment::mock([
            'REQUEST_METHOD' => $requestMethod,
            'REQUEST_URI' => $requestUri,
            'QUERY_STRING' => ($requestMethod == "GET") ? http_build_query($requestData) : "",
        ]);

        $request = Request::createFromEnvironment($enviroment);

        if (!empty($requestData)) {
            $request = $request->withParsedBody($requestData);
        }

        $request = $request->withHeader('Content-Type', 'application/json');

        $response = new Response();

        if (!defined('VIEWS_DIR')) {
            define("VIEWS_DIR", '../src/public/App/Views');
        }

        if (!defined('CACHE_DIR')) {
            define("CACHE_DIR", '../src/public/App/Views/Cache');
        }

        if (!defined('IMAGES_DIR')) {
            define("IMAGES_DIR", '../src/public/Uploads/Images');
        }

        $config = [];

        require '../src/vendor/autoload.php';
        require '../src/public/App/Config/app.php';
        require '../src/public/App/Config/db.php';

        $app = new App(['settings' => $config]);

        $container = $app->getContainer();

        require '../src/public/App/Config/dependencies.php';
        require '../src/public/App/Middleware/AuthMiddleware.php';
        require '../src/public/App/Config/routes.php';

        $response = $app->process($request, $response);

        return $response;
    }
}