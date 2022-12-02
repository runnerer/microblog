<?php

namespace App\Controllers;

use App\Models\Post;
use App\Controllers\MainController;

class AdminController extends MainController {
    public function index($request, $response, $args) {
        $post = new Post($this->container);

        return self::view("admin", [
            'posts' => $post->get()
        ], $response);
    }
}