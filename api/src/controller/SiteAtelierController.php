<?php

namespace App\Controller;

use App\Helper\ValidateHelper as ValidateHelper;
use App\Model\SiteAtelierModel as SiteAtelierModel;
use App\Helper\GenerateHelper as GenerateHelper;
use App\Helper\ImageHelper;
use App\Helper\ResponseHelper as ResponseHelper;

class SiteAtelierController {
    public function read(array $data): void {
        $atelier = (new SiteAtelierModel())->find();
        if ($atelier->count() > 0) {
            $atelier = $atelier->fetch(true);
            $result = array_map(
                fn(SiteAtelierModel $s) => [
                    'id' => $s->id,
                    'image' => $s->image,
                    'title' => $s->title,
                    'description' => $s->description,
                    'created_at' => $s->created_at,
                    'updated_at' => $s->updated_at
                ],
                $atelier
            );
            ResponseHelper::send(RESPONSE_SUCCESS, 'Ok', $result);
        } else {
            ResponseHelper::send(REQUEST_ERROR, 'Nenhuma seção atelier encontrada', []);
        }
    }

    public function create(array $data): void {
        $token = $_SERVER['HTTP_TOKEN'];
        if (ValidateHelper::checkToken($token)) {
            $imageName = GenerateHelper::randomImage('.svg');
            if (file_put_contents(
                     __DIR__ . '/../../../assets/img/atelier/' . $imageName,
                    file_get_contents(__DIR__ . '/../../../assets/img/backup/atelier_image.webp')
            )) {
                $atelier = new SiteAtelierModel();
                $atelier->image = $imageName;
                $atelier->title = 'Título';
                $atelier->description = 'Descrição';
                if ($atelier->save()) {
                    ResponseHelper::send(RESPONSE_SUCCESS, 'Seção atelier criada com sucesso');
                } else {
                    ResponseHelper::send(RESPONSE_ERROR, 'Ocorreu um erro ao criar a seção atelier');
                }
            } else {
                ResponseHelper::send(
                    RESPONSE_ERROR,
                    'Não foi possível criar uma imagem para a seção atelier'
                );
            }
        } else {
            ResponseHelper::send(REQUEST_ERROR, 'Usuário não está logado');
        }
    }

    public function update(array $data): void {
        $token = $_SERVER['HTTP_TOKEN'];
        if (ValidateHelper::checkToken($token)) {
            $id = $data['id'];
            $image = $data['image'];
            $title = $data['title'];
            $description = $data['description'];

            $atelier = (new SiteAtelierModel())->find('id = :id', 'id=' . $id);
            if ($atelier->count() > 0) {
                $atelier = $atelier->fetch();
                
                $oldImage = $atelier->image;

                if ($image != null) {
                    $imageName = ImageHelper::base64UrlToFile(
                        $image,
                        __DIR__ . '/../../../assets/img/atelier/'
                    );
                    if (is_string($imageName)) {
                        $atelier->image = $imageName;
                    } else {
                        ResponseHelper::send(
                            RESPONSE_ERROR,
                            'Não foi possível salvar a nova imagem'
                        );
                    }
                }
                if ($title != null) {
                    $atelier->title = $title;
                }
                if ($description != null) {
                    $atelier->description = $description;
                }
    
                if ($atelier->save()) {
                    if ($atelier->image != $oldImage) {
                        unlink(__DIR__ . '/../../../assets/img/atelier/' . $oldImage);
                    }
                    ResponseHelper::send(RESPONSE_SUCCESS, 'Seção atelier alterada com sucesso');
                } else {
                    ResponseHelper::send(RESPONSE_ERROR, 'Não foi possível alterar a seção atelier');
                }
            } else {
                ResponseHelper::send(REQUEST_ERROR, 'Seção atelier não existe');
            }
        } else {
            ResponseHelper::send(REQUEST_ERROR, 'Usuário não está logado');
        }
    }

    public function delete(array $data): void {
        $token = $_SERVER['HTTP_TOKEN'];
        if (ValidateHelper::checkToken($token)) {
            $id = $data['id'];
            if ($id) {
                $atelier = (new SiteAtelierModel())->find('id = :id', 'id=' . $id);
                if ($atelier->count() > 0) {
                    $atelier = $atelier->fetch();
                    if ($atelier->destroy()) {
                        unlink(__DIR__ . '/../../../assets/img/atelier/' . $atelier->image);
                        ResponseHelper::send(RESPONSE_SUCCESS, 'Seção atelier deletada com sucesso');
                    } else {
                        ResponseHelper::send(
                            RESPONSE_ERROR,
                            'Ocorreu um erro ao deletar a seção atelier'
                        );
                    }
                } else {
                    ResponseHelper::send(REQUEST_ERROR, 'Seção atelier não existe');
                }
            } else {
                ResponseHelper::send(REQUEST_ERROR, 'ID da seção atelier incorreto');
            }
        } else {
            ResponseHelper::send(REQUEST_ERROR, 'Usuário não está logado');
        }
    }
}
