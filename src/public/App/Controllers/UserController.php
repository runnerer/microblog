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
    }

    public function update($request, $response, $args) {
    }

    public function delete($request, $response, $args) {
    }
}