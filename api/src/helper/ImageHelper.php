<?php

namespace App\Helper;

class ImageHelper {
    static function supportedMimeTypes(): array {
        return [
            'png' => 'image/png',
            'jpg' => 'image/jpg',
            'jpeg' => 'image/jpeg',
            'gif' => 'image/gif',
            'svg' => 'image/svg+xml',
            'webp' => 'image/webp'
        ];
    }

    static function fromBase64(string $base64): string|false {
        $image64 = str_replace(' ', '+', $base64);
        $image = base64_decode($image64);
        if ($image) {
            return $image;
        } else {
            return false;
        }
    }

    static function base64UrlToFile(string $base64Url, ?string $path): string|false {
        $parts = explode(',', $base64Url);

        $image = ImageHelper::fromBase64($parts[1]);

        $mimeTypeBegin = strpos($parts[0], ':') + 1;
        $mimeTypeEnd = strrpos($parts[0], ';');
        $mimeType = substr($parts[0], $mimeTypeBegin, $mimeTypeEnd - $mimeTypeBegin);

        $extension = array_search($mimeType, ImageHelper::supportedMimeTypes());

        if ($image && is_string($extension)) {
            $imageName = GenerateHelper::randomImage('.' . $extension);
            if (file_put_contents($path . '/' . $imageName, $image)) {
                return $imageName;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
}
