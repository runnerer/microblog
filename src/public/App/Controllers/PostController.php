<?php

namespace App\Controllers;

use App\Models\Post;
use App\Controllers\MainController;
use App\Models\Requests\RequestsValidator;
use App\Models\Services\UploadFile;

class PostController extends MainController {
    public function index($request, $response, $args) {
        $post = new Post($this->container);

        self::view("posts", [
            'posts' => $post->get()
        ]);
    }

    public function create($request, $response, $args) {
        $postData = $request->getParsedBody();

        RequestsValidator::validate($postData);

        if (!RequestsValidator::$isRequestValid) {
            return self::getErrorResponse(RequestsValidator::$errorMessage, $response);
        }

        $imageName = UploadFile::image($postData['image']);

        $postModel = new Post($this->container);

        $postData['user_id'] = $_SESSION['user'];
        $postData['image'] = $imageName;

        $postModel->create($postData);

        return self::getOkResponse([], $response);
    }

    public function update($request, $response, $args) {
        $newPostData = $request->getParsedBody();

        RequestsValidator::validate($newPostData);

        if (!RequestsValidator::$isRequestValid) {
            return self::getErrorResponse(RequestsValidator::$errorMessage, $response);
        }

        if (strpos($newPostData['image'], 'uploads') === false) {
            $imageName = UploadFile::image($newPostData['image']);

            $newPostData['image'] = $imageName;
        }
        else {
            unset($newPostData['image']);
        }

        $postModel = new Post($this->container);

        $postModel->update($args['id'], $newPostData);

        return self::getOkResponse([], $response);
    }
}