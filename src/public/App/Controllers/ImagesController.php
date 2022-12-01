<?php

namespace App\Controllers;

use App\Controllers\MainController;

class ImagesController extends MainController {
    public function __invoke($request, $response, $args) {
        $image = @file_get_contents(IMAGES_DIR. $args['name']);

        if ($image !== FALSE) {
            return self::getFileResponse($image, $response);
        }

        return self::getErrorResponse('Image not found.', $response);
    }
}