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
        $user = $userModel->getByEmailAndPassword($userData['email'], $userData['password']);

        if (empty($user)) {
            self::sendErrorResponse('Wrong Email or Password. Please try again.');
        }
        else {
            $_SESSION['user'] = $user[0]->id;

            return $response->withStatus(200)->withJson([]);
        }
    }

    public function logout($request, $response, $args) {
        unset($_SESSION['user']);

        return $response->withRedirect('/');
    }
}