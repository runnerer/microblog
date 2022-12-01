<?php

namespace App\Models\Services\Post;

use Slim\Container;
use App\Models\Post;

class CreatePostService {
    protected $container;

    public function __construct(Container $container) {
        $this->container = $container;
    }

    public function create($postData) {
        $imageName = $this->container->UploadImageService->upload($postData['image']);

        $postModel = new Post($this->container);

        $postData['user_id'] = $_SESSION['user'];
        $postData['image'] = $imageName;

        $postModel->create($postData);
    }
}