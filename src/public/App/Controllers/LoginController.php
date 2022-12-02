<?php

namespace App\Controllers;

use App\Models\User;
use App\Controllers\MainController;
use App\Models\Requests\RequestsValidator;

class LoginController extends MainController {
    public function index($request, $response, $args) {
        return self::view('login', [], $response);
    }

    public function login($request, $response, $args) {
        $userData = $request->getParsedBody();

        RequestsValidator::validate($userData);

        if (!RequestsValidator::$isRequestValid) {
            return self::getErrorResponse(RequestsValidator::$errorMessage, $response);
        }

        $userModel = new User($this->container);
        $user = $userModel->getByEmail($userData['email']);

        if (empty($user)) {
            return self::getErrorResponse('Wrong Email. Please try again.', $response);
        }

        if (!$this->container->AuthenticationService->authenticate($userData, $user)) {
            return self::getErrorResponse('Wrong Password. Please try again.', $response);
        }

        return self::getOkResponse([], $response);
    }

    public function logout($request, $response, $args) {
        unset($_SESSION['user']);

        return self::getRedirectResponse('/', $response);
    }
}