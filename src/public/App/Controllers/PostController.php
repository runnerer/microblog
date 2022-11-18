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

        $isRequestValid = RequestsValidator::validate($postData);

        if (is_string($isRequestValid)) {
            self::sendErrorResponse($isRequestValid);
        }

        $imageName = UploadFile::image($postData['image']);

        $postModel = new Post($this->container);

        session_start();

        $postData['user_id'] = $_SESSION['user'];
        $postData['image'] = $imageName;

        $postModel->create($postData);

        self::send200Response();
    }

    public function update($request, $response, $args) {
        $newPostData = $request->getParsedBody();

        $isRequestValid = RequestsValidator::validate($newPostData);

        if (is_string($isRequestValid)) {
            self::sendErrorResponse($isRequestValid);
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

        self::send200Response();
    }
}