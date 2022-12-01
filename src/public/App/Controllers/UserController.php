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
            return self::getErrorResponse(RequestsValidator::$errorMessage, $response);
        }

        $userData['password'] = password_hash($userData['password'], PASSWORD_DEFAULT);

        $userModel = new User($this->container);
        $user = $userModel->create($userData);

        if (empty($user)) {
            return self::getErrorResponse('Error while creating your account. Please try again.', $response);
        }

        return self::getOkResponse([], $response);
    }

    public function update($request, $response, $args) {
    }

    public function delete($request, $response, $args) {
    }
}