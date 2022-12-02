<?php

namespace App\Controller;

use App\Helper\ResponseHelper as ResponseHelper;
use App\Model\ServiceModel as ServiceModel;

class ServiceController {
    public function read(array $data): void {
        $service = (new ServiceModel())->find();
        if ($service->count() > 0) {
            $service = $service->fetch(true);
            $result = array_map(
                fn(ServiceModel $s) => [
                    'id' => $s->id,
                    'image' => $s->image,
                    'title' => $s->title,
                    'description' => $s->description,
                    'created_at' => $s->created_at,
                    'updated_at' => $s->updated_at,
                ],
                $service,
            );
            ResponseHelper::send(RESPONSE_SUCCESS, 'Ok', $result);
        } else {
            ResponseHelper::send(REQUEST_ERROR, 'Nenhum serviço encontrado', []);
        }
    }

    public function create(array $data): void {
        $service = (new ServiceModel())->find();
        if ($service->count() > 0) {
            $service = $service->fetch(true);
            $result = array_map(
                fn(ServiceModel $s) => [
                    'id' => $s->id,
                    'image' => $s->image,
                    'title' => $s->title,
                    'description' => $s->description,
                    'created_at' => $s->created_at,
                    'updated_at' => $s->updated_at,
                ],
                $service,
            );
            ResponseHelper::send(RESPONSE_SUCCESS, 'Ok', $result);
        } else {
            ResponseHelper::send(REQUEST_ERROR, 'Nenhum serviço encontrado', []);
        }
    }
}
