<?php

namespace App\Models\Services;

class UploadImageService {
    public function upload($base64String) {
        $extension = explode('/', mime_content_type($base64String))[1];
        $imageName = self::generateRandomString(7). '.'. $extension;
        $data = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $base64String));

        file_put_contents(IMAGES_DIR. '/'. $imageName, $data);

        return $imageName;
    }

    private function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';

        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }

        return $randomString;
    }
}