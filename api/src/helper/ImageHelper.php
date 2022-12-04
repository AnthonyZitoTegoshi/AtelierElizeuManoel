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

    static function extensionFromBase64(string $base64): string|false {
        $base64 = str_replace(' ', '+', $base64);
        $mimeTypeBegin = strpos($base64, ':') + 1;
        $mimeTypeEnd = strrpos($base64, ';');
        $mimeType = substr($base64, $mimeTypeBegin, $mimeTypeEnd - $mimeTypeBegin);
        $extension = array_search($mimeType, ImageHelper::supportedMimeTypes());
        return $extension;
    }

    static function base64UrlToFile(
        string $base64Url,
        ?string $path = null,
        ?string $requiredExtension = null
    ): string|false {
        $parts = explode(',', $base64Url);

        $image = ImageHelper::fromBase64($parts[1]);

        $extension = ImageHelper::extensionFromBase64($parts[0]);
        if ($extension != $requiredExtension && $requiredExtension != null) {
            return false;
        }

        if ($image && is_string($extension)) {
            $imageName = GenerateHelper::randomImage('.' . $extension);

            $fullPath = '';
            if ($path == null) {
                $fullPath .= './' . $imageName;
            } else if ($path[strlen($path) - 1] == '/') {
                $fullPath .= $path . $imageName;
            } else {
                $fullPath = $path;
                $imageName = substr($fullPath, strrpos($fullPath, '/'));
            }

            if (file_put_contents($fullPath, $image)) {
                return $imageName;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
}
