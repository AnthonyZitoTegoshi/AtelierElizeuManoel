<?php

namespace App\Controller;

use App\Helper\ValidateHelper as ValidateHelper;
use App\Model\SitePhraseModel as SitePhraseModel;
use App\Helper\ResponseHelper as ResponseHelper;
use App\Helper\LevelHelper as LevelHelper;

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
            $permissions = LevelHelper::getPermissions($token);
            if ($permissions != null) {
                if (LevelHelper::hasEditElementPermission($permissions)) {
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
                    ResponseHelper::send(
                        REQUEST_ERROR,
                        'Usuário não tem permissão para editar a frase'
                    );
                }
            } else {
                ResponseHelper::send(
                    RESPONSE_ERROR,
                    'Ocorreu um erro ao verificar as permissões do usuário'
                );
            }
        } else {
            ResponseHelper::send(TOKEN_ERROR, 'Usuário não está logado');
        }
    }
}
