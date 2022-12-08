<?php

namespace App\Controller;

use App\Helper\ValidateHelper as ValidateHelper;
use App\Model\SiteColorModel as SiteColorModel;
use App\Helper\ResponseHelper as ResponseHelper;

class SiteColorController {
    public function read(array $data): void {
        $color = (new SiteColorModel())->find();
        if ($color->count() > 0) {
            $color = $color->fetch(true);

            $result = array_map(
                fn(SiteColorModel $c) => [
                    'id' => $c->id,
                    'name' => $c->name,
                    'value' => $c->value,
                    'created_at' => $c->created_at,
                    'updated_at' => $c->updated_at
                ],
                $color
            );

            ResponseHelper::send(RESPONSE_SUCCESS, 'Ok', $result);
        } else {
            ResponseHelper::send(REQUEST_ERROR, 'Nenhuma cor encontrada', []);
        }
    }

    public function update(array $data): void {
        $token = $_SERVER['HTTP_TOKEN'];
        if (ValidateHelper::checkToken($token)) {
            $id = $data['id'];
            $value = $data['value'];

            $color = (new SiteColorModel())->find('id = :id', 'id=' . $id);
            if ($color->count() > 0) {
                $color = $color->fetch();

                if ($value != null) {
                    $color->value = $value;
                }
    
                if ($color->save()) {
                    ResponseHelper::send(RESPONSE_SUCCESS, 'Cor alterada com sucesso');
                } else {
                    ResponseHelper::send(RESPONSE_ERROR, 'Não foi possível alterar a cor');
                }
            } else {
                ResponseHelper::send(REQUEST_ERROR, 'Cor não existe');
            }
        } else {
            ResponseHelper::send(REQUEST_ERROR, 'Usuário não está logado');
        }
    }
}
