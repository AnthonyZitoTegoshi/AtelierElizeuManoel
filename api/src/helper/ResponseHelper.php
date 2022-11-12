<?php

namespace App\Helper;

class ResponseHelper {
    static function send(
        int $status,
        string $message,
        ?string $result = null,
    ): void {
        echo json_encode([
            'status' => $status,
            'message' => $message,
            'result' => $result,
        ]);
        die();
    }
}
