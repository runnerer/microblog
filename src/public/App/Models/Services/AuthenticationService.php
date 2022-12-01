<?php

namespace App\Models\Services;

class AuthenticationService {
    public static function authenticate($userData, $user) {
        if (!password_verify($userData['password'], $user[0]->password)) {
            return false;
        }

        $_SESSION['user'] = $user[0]->id;

        return true;
    }
}