<?php

namespace App\Controller;

use App\Helper\ValidateHelper as ValidateHelper;
use App\Model\SiteServiceModel as SiteServiceModel;
use App\Helper\GenerateHelper as GenerateHelper;
use App\Helper\ImageHelper as ImageHelper;
use App\Helper\LevelHelper as LevelHelper;
use App\Helper\ResponseHelper as ResponseHelper;

class SiteServiceController {
    public function read(array $data): void {
        $service = (new SiteServiceModel())->find();
        if ($service->count() > 0) {
            $service = $service->fetch(true);
            $result = array_map(
                fn(SiteServiceModel $s) => [
                    'id' => $s->id,
                    'image' => $s->image,
                    'title' => $s->title,
                    'description' => $s->description,
                    'created_at' => $s->created_at,
                    'updated_at' => $s->updated_at
                ],
                $service
            );
            ResponseHelper::send(RESPONSE_SUCCESS, 'Ok', $result);
        } else {
            ResponseHelper::send(REQUEST_ERROR, 'Nenhum serviço encontrado', []);
        }
    }

    public function create(array $data): void {
        $token = $_SERVER['HTTP_TOKEN'];
        if (ValidateHelper::checkToken($token)) {
            $permissions = LevelHelper::getPermissions($token);
            if ($permissions != null) {
                if (LevelHelper::hasCreateElementPermission($permissions)) {
                    $imageName = GenerateHelper::randomImage('.svg');
                    if (file_put_contents(
                            __DIR__ . '/../../../assets/img/services/' . $imageName,
                            '<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="200" zoomAndPan="magnify" viewBox="0 0 150 149.999998" height="200" preserveAspectRatio="xMidYMid meet" version="1.0"><path fill="#f2f2f2" d="M 75 0 C 116.421875 0 150 33.578125 150 75 C 150 116.421875 116.421875 150 75 150 C 33.578125 150 0 116.421875 0 75 C 0 33.578125 33.578125 0 75 0 " fill-opacity="1" fill-rule="nonzero"/><path fill="#d97904" d="M 74.910156 15.015625 C 73.519531 15.082031 73.589844 16.378906 73.503906 17.535156 C 72.804688 17.515625 72.304688 17.8125 72.117188 18.613281 C 69.976562 19.074219 71.152344 20.992188 72.195312 21.167969 C 72.988281 21.253906 72.203125 21.988281 72.484375 22.226562 C 72.671875 22.386719 73.214844 22.304688 73.214844 22.304688 L 72.886719 24.667969 C 72.4375 24.632812 72.042969 24.976562 72.023438 25.339844 C 72.003906 25.652344 72.492188 25.992188 72.695312 25.992188 L 72.714844 26.242188 C 72.4375 26.335938 72.117188 26.371094 71.789062 26.226562 C 71.566406 25.9375 71.339844 26.054688 71.117188 26.226562 L 70.617188 26.226562 C 69.871094 23.75 66.492188 25.519531 66.34375 26.957031 C 66.199219 28.332031 69.488281 29.089844 70.210938 28.472656 C 70.394531 27.929688 70.644531 27.652344 70.980469 27.722656 C 71.234375 28 71.523438 28.0625 71.878906 27.722656 C 72.199219 27.660156 72.457031 27.679688 72.628906 27.820312 L 72.578125 28.53125 C 72.039062 28.46875 71.746094 28.835938 71.734375 29.195312 C 71.722656 29.542969 72.269531 29.898438 72.511719 29.898438 L 72.347656 31.742188 C 72.082031 32.085938 71.667969 31.777344 71.308594 31.703125 C 71.046875 31.503906 70.945312 31.792969 70.769531 31.867188 C 70.632812 32.097656 70.496094 31.910156 70.355469 31.855469 C 68.214844 30.5 65.652344 31.492188 66.121094 32.75 C 66.285156 34.945312 69.183594 33.964844 70.808594 33.175781 C 71.203125 33.609375 71.453125 33.320312 71.753906 33.289062 C 72.085938 33.15625 72.40625 33.136719 72.6875 33.460938 C 72.359375 42.605469 72.09375 51.769531 71.75 60.90625 C 57.1875 63.304688 56.027344 72.242188 59.21875 83.300781 C 59.414062 84.070312 59.265625 84.839844 58.949219 85.609375 C 58.679688 86.691406 59.355469 86.714844 59.871094 86.914062 C 67.324219 89.605469 64.121094 100.808594 59.449219 102.5625 C 58.417969 102.953125 55.949219 100.976562 56.484375 105.410156 C 56.738281 106.101562 56.394531 107.308594 55.828125 108.714844 C 48.78125 128.480469 60.964844 134.484375 71.765625 134.875 L 71.765625 134.90625 C 72.808594 134.976562 73.898438 134.992188 75.035156 134.941406 C 76.171875 134.992188 77.261719 134.976562 78.304688 134.90625 L 78.304688 134.875 C 89.105469 134.484375 101.28125 128.476562 94.234375 108.714844 C 93.671875 107.3125 93.328125 106.101562 93.582031 105.410156 C 94.117188 100.976562 91.648438 102.953125 90.617188 102.5625 C 85.945312 100.808594 82.742188 89.605469 90.195312 86.917969 C 90.710938 86.714844 91.386719 86.691406 91.117188 85.609375 C 90.800781 84.839844 90.652344 84.070312 90.847656 83.300781 C 94.039062 72.242188 92.878906 63.304688 78.316406 60.90625 L 77.277344 33.242188 C 77.972656 32.972656 78.082031 32.597656 78.027344 32.164062 C 77.992188 31.886719 77.628906 31.636719 77.390625 31.609375 L 77.257812 29.992188 L 77.71875 29.992188 C 78.082031 30.25 78.332031 30.113281 78.566406 29.917969 C 78.753906 29.886719 78.941406 29.855469 79.027344 30.050781 C 79.808594 32.21875 83.703125 31.433594 83.320312 29.203125 C 82.835938 26.371094 79.078125 28.011719 79.046875 28.589844 C 78.910156 28.734375 78.746094 28.675781 78.585938 28.648438 C 78.3125 28.511719 78.042969 28.339844 77.71875 28.550781 C 77.558594 28.644531 77.386719 28.621094 77.199219 28.453125 L 77.105469 27.609375 C 77.320312 27.648438 77.554688 26.902344 77.027344 26.398438 C 76.980469 26.355469 77.117188 26.226562 77.117188 26.226562 C 77.363281 25.945312 78.175781 25.914062 78.296875 26.148438 C 79.898438 29.21875 82.472656 26.578125 82.492188 25.628906 C 82.582031 21.832031 78.367188 23.042969 78.449219 24.648438 C 78.46875 24.953125 78.113281 24.738281 77.96875 24.820312 C 77.027344 24.816406 77.175781 24.878906 76.726562 24.683594 L 76.429688 22.324219 C 76.59375 22.113281 77.136719 22.449219 77.355469 22.226562 C 77.597656 21.976562 76.828125 21.320312 77.429688 21.1875 C 78.589844 21.027344 79.875 19 77.546875 18.652344 C 77.640625 17.84375 77.132812 17.570312 76.410156 17.476562 C 76.476562 15.894531 76.023438 15.011719 74.910156 15.015625 Z M 74.910156 15.015625 " fill-opacity="1" fill-rule="evenodd"/></svg>'
                    )) {
                        $service = new SiteServiceModel();
                        $service->image = $imageName;
                        $service->title = 'Título';
                        $service->description = 'Descrição';
                        if ($service->save()) {
                            ResponseHelper::send(RESPONSE_SUCCESS, 'Serviço criado com sucesso');
                        } else {
                            ResponseHelper::send(RESPONSE_ERROR, 'Ocorreu um erro ao criar o serviço');
                        }
                    } else {
                        ResponseHelper::send(
                            RESPONSE_ERROR,
                            'Não foi possível criar uma imagem para o serviço'
                        );
                    }
                } else {
                    ResponseHelper::send(
                        REQUEST_ERROR,
                        'Usuário não tem permissão para criar um serviço'
                    );
                }
            } else {
                ResponseHelper::send(
                    RESPONSE_ERROR,
                    'Ocorreu um erro ao verificar as permissões do usuário'
                );
            }
        } else {
            ResponseHelper::send(TOKEN_ERROR, 'Sessão expirada');
        }
    }

    public function update(array $data): void {
        $token = $_SERVER['HTTP_TOKEN'];
        if (ValidateHelper::checkToken($token)) {
            $permissions = LevelHelper::getPermissions($token);
            if ($permissions != null) {
                if (LevelHelper::hasEditElementPermission($permissions)) {
                    $id = $data['id'];
                    $image = $data['image'];
                    $title = $data['title'];
                    $description = $data['description'];

                    $service = (new SiteServiceModel())->find('id = :id', 'id=' . $id);
                    if ($service->count() > 0) {
                        $service = $service->fetch();
                        
                        $oldImage = $service->image;

                        if ($image != null) {
                            $imageName = ImageHelper::base64UrlToFile(
                                $image,
                                __DIR__ . '/../../../assets/img/services/'
                            );
                            if (is_string($imageName)) {
                                $service->image = $imageName;
                            } else {
                                ResponseHelper::send(
                                    RESPONSE_ERROR,
                                    'Não foi possível salvar a nova imagem'
                                );
                            }
                        }
                        if ($title != null) {
                            $service->title = $title;
                        }
                        if ($description != null) {
                            $service->description = $description;
                        }
            
                        if ($service->save()) {
                            if ($service->image != $oldImage) {
                                unlink(__DIR__ . '/../../../assets/img/services/' . $oldImage);
                            }
                            ResponseHelper::send(RESPONSE_SUCCESS, 'Serviço alterado com sucesso');
                        } else {
                            ResponseHelper::send(RESPONSE_ERROR, 'Não foi possível alterar o serviço');
                        }
                    } else {
                        ResponseHelper::send(REQUEST_ERROR, 'Serviço não existe');
                    }
                } else {
                    ResponseHelper::send(
                        REQUEST_ERROR,
                        'Usuário não tem permissão para editar um serviço'
                    );
                }
            } else {
                ResponseHelper::send(
                    RESPONSE_ERROR,
                    'Ocorreu um erro ao verificar as permissões do usuário'
                );
            }
        } else {
            ResponseHelper::send(TOKEN_ERROR, 'Sessão expirada');
        }
    }

    public function delete(array $data): void {
        $token = $_SERVER['HTTP_TOKEN'];
        if (ValidateHelper::checkToken($token)) {
            $permissions = LevelHelper::getPermissions($token);
            if ($permissions != null) {
                if (LevelHelper::hasEditElementPermission($permissions)) {
                    $id = $data['id'];
                    if ($id) {
                        $service = (new SiteServiceModel())->find('id = :id', 'id=' . $id);
                        if ($service->count() > 0) {
                            $service = $service->fetch();
                            if ($service->destroy()) {
                                unlink(__DIR__ . '/../../../assets/img/services/' . $service->image);
                                ResponseHelper::send(RESPONSE_SUCCESS, 'Serviço deletado com sucesso');
                            } else {
                                ResponseHelper::send(RESPONSE_ERROR, 'Ocorreu um erro ao deletar o serviço');
                            }
                        } else {
                            ResponseHelper::send(REQUEST_ERROR, 'Serviço não existe');
                        }
                    } else {
                        ResponseHelper::send(REQUEST_ERROR, 'ID do serviço incorreto');
                    }
                } else {
                    ResponseHelper::send(
                        REQUEST_ERROR,
                        'Usuário não tem permissão para deletar um serviço'
                    );
                }
            } else {
                ResponseHelper::send(
                    RESPONSE_ERROR,
                    'Ocorreu um erro ao verificar as permissões do usuário'
                );
            }
        } else {
            ResponseHelper::send(TOKEN_ERROR, 'Sessão expirada');
        }
    }
}
