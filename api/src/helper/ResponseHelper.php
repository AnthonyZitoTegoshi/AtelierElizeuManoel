<?php

namespace App\Helper;

class ResponseHelper {
    static function send(
        int $status,
        string $message,
        array|string|null $result = null
    ): void {
        echo json_encode([
            'status' => $status,
            'message' => $message,
            'result' => $result
        ]);
        die();
    }
}
