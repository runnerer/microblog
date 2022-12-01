<?php

namespace App\Controllers;

use App\Models\User;
use App\Controllers\MainController;
use App\Models\Requests\RequestsValidator;

class UserController extends MainController {
    public function index($request, $response, $args) {
        $userModel = new User($this->container);

        self::view("users", [
            'users' => $userModel->get()
        ]);
    }

    public function create($request, $response, $args) {
        $userData = $request->getParsedBody();

        RequestsValidator::validate($userData);

        if (!RequestsValidator::$isRequestValid) {
            self::sendErrorResponse(RequestsValidator::$errorMessage);
        }

        $userData['password'] = password_hash($userData['password'], PASSWORD_DEFAULT);

        $userModel = new User($this->container);
        $user = $userModel->create($userData);

        if (empty($user)) {
            self::sendErrorResponse('Error while creating your account. Please try again.');
        }

        return $response->withStatus(200)->withJson([]);
    }

    public function update($request, $response, $args) {
    }

    public function delete($request, $response, $args) {
    }
}