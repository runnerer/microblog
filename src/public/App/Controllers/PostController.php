<?php

namespace App\Controllers;

use App\Models\Post;
use App\Controllers\MainController;
use App\Models\Requests\RequestsValidator;

class PostController extends MainController {
    public function index($request, $response, $args) {
        $post = new Post($this->container);

        return self::view("posts", [
            'posts' => $post->get()
        ], $response);
    }

    public function create($request, $response, $args) {
        $postData = $request->getParsedBody();

        RequestsValidator::validate($postData);

        if (!RequestsValidator::$isRequestValid) {
            return self::getErrorResponse(RequestsValidator::$errorMessage, $response);
        }

        $this->container->CreatePostService->create($postData);

        return self::getOkResponse([], $response);
    }

    public function update($request, $response, $args) {
        $newPostData = $request->getParsedBody();

        RequestsValidator::validate($newPostData);

        if (!RequestsValidator::$isRequestValid) {
            return self::getErrorResponse(RequestsValidator::$errorMessage, $response);
        }

        $this->container->UpdatePostService->update($newPostData, $args['id']);

        return self::getOkResponse([], $response);
    }
}