<?php

namespace App\Controller;

use App\Helper\ImageHelper as ImageHelper;
use App\Helper\ResponseHelper as ResponseHelper;
use App\Helper\ValidateHelper as ValidateHelper;

class ImageController {
    public function updateLogo(array $data): void {
        $token = $_SERVER['HTTP_TOKEN'];
        if (ValidateHelper::checkToken($token)) {
            $image = $data['image'];
            if ($image != null) {
                $imageName = ImageHelper::base64UrlToFile(
                    $image,
                    __DIR__ . '/../../../assets/img/atelier_logo.svg',
                    'svg'
                );
                if (is_string($imageName)) {
                    ResponseHelper::send(RESPONSE_SUCCESS, 'Logo alterada com sucesso');
                } else {
                    ResponseHelper::send(RESPONSE_ERROR, 'Não foi possível salvar a nova imagem');
                }
            } else {
                ResponseHelper::send(REQUEST_ERROR, 'Nenhuma imagem selecionada');
            }
        } else {
            ResponseHelper::send(REQUEST_ERROR, 'Usuário não está logado');
        }
    }
}
