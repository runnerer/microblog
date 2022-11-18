<?php

namespace App\Models\Requests;

class RequestsValidator {
    public static function validate($properties) {
        $errorMessage = false;

        foreach ($properties as $propertyName => $propertyValue) {
            if (empty($propertyValue)) {
                $errorMessage = $propertyName. " field cannot be empty.";
            }

            switch ($propertyName) {
                case 'email':
                    if (!filter_var($propertyValue, FILTER_VALIDATE_EMAIL)) {
                        $errorMessage = "Invalid email format.";
                    }

                    break;

                case 'password':
                    if (strlen($propertyValue) < 7) {
                        $errorMessage = "Password is too short.";
                    }

                    break;
            }

            if ($errorMessage !== false) {
                return $errorMessage;
            }
        }
    }
}