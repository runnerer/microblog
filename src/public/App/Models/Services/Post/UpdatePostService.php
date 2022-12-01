<?php

namespace App\Models\Services\Post;

use Slim\Container;
use App\Models\Post;

class UpdatePostService {
    protected $container;

    public function __construct(Container $container) {
        $this->container = $container;
    }

    public function update($postData, $postId) {
        if (strpos($postData['image'], 'uploads') === false) {
            $imageName = $this->container->UploadImageService->upload($postData['image']);

            $postData['image'] = $imageName;
        }
        else {
            unset($postData['image']);
        }

        $postModel = new Post($this->container);

        $postModel->update($postId, $postData);
    }
}