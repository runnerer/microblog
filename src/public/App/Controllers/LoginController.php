<?php

namespace App\Controllers;

use App\Models\User;
use App\Controllers\MainController;
use App\Models\Requests\RequestsValidator;

class LoginController extends MainController {
    public function index($request, $response, $args) {
        self::view('login');
    }

    public function login($request, $response, $args) {
        $userData = $request->getParsedBody();

        $isRequestValid = RequestsValidator::validate($userData);

        if (is_string($isRequestValid)) {
            self::sendErrorResponse($isRequestValid);
        }

        $userModel = new User($this->container);
        $user = $userModel->getByEmail($userData['email']);

        if (empty($user)) {
            self::sendErrorResponse('Wrong Email. Please try again.');
        }

        if (!$this->container->AuthenticationService->authenticate($userData, $user)) {
            self::sendErrorResponse('Wrong Password. Please try again.');
        }

        return $response->withStatus(200)->withJson([]);
    }

    public function logout($request, $response, $args) {
        unset($_SESSION['user']);

        return $response->withRedirect('/');
    }
}