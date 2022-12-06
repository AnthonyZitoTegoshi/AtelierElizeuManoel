<?php

namespace App\Controller;

use App\Helper\ValidateHelper as ValidateHelper;
use App\Model\SitePhraseModel as SitePhraseModel;
use App\Helper\GenerateHelper as GenerateHelper;
use App\Helper\ImageHelper;
use App\Helper\ResponseHelper as ResponseHelper;

class SitePhraseController {
    public function read(array $data): void {
        $phrase = (new SitePhraseModel())->find();
        if ($phrase->count() > 0) {
            $phrase = $phrase->fetch();

            ResponseHelper::send(
                RESPONSE_SUCCESS,
                'Ok',
                [
                    'id' => $phrase->id,
                    'text' => $phrase->text,
                    'created_at' => $phrase->created_at,
                    'updated_at' => $phrase->updated_at
                ]
            );
        } else {
            ResponseHelper::send(REQUEST_ERROR, 'Nenhuma frase encontrada', []);
        }
    }

    public function update(array $data): void {
        $token = $_SERVER['HTTP_TOKEN'];
        if (ValidateHelper::checkToken($token)) {
            $id = $data['id'];
            $text = $data['text'];

            $phrase = (new SitePhraseModel())->find('id = :id', 'id=' . $id);
            if ($phrase->count() > 0) {
                $phrase = $phrase->fetch();

                if ($text != null) {
                    $phrase->text = $text;
                }
    
                if ($phrase->save()) {
                    ResponseHelper::send(RESPONSE_SUCCESS, 'Frase alterada com sucesso');
                } else {
                    ResponseHelper::send(RESPONSE_ERROR, 'Não foi possível alterar a frase');
                }
            } else {
                ResponseHelper::send(REQUEST_ERROR, 'Frase não existe');
            }
        } else {
            ResponseHelper::send(REQUEST_ERROR, 'Usuário não está logado');
        }
    }
}
