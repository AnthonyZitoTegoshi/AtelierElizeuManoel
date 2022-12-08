<?php

namespace App\Controller;

use App\Helper\ImageHelper as ImageHelper;
use App\Helper\LevelHelper as LevelHelper;
use App\Helper\ResponseHelper as ResponseHelper;
use App\Helper\ValidateHelper as ValidateHelper;
use App\Model\SiteImageModel as SiteImageModel;

class SiteImageController {
    public function updateLogo(array $data): void {
        $token = $_SERVER['HTTP_TOKEN'];
        if (ValidateHelper::checkToken($token)) {
            $permissions = LevelHelper::getPermissions($token);
            if ($permissions != null) {
                if (LevelHelper::hasEditElementPermission($permissions)) {
                    $image = $data['image'];
                    if ($image != null) {
                        $extension = ImageHelper::extensionFromBase64($image);
                        if (is_string($extension)) {
                            $logo = (new SiteImageModel())->find('name = :name', 'name=atelier_logo');
                            if ($logo->count() > 0) {
                                $logo = $logo->fetch();
                                unlink(__DIR__ . '/../../../assets/img/atelier_logo.' . $logo->extension);
                            }
                            $imageName = ImageHelper::base64UrlToFile(
                                $image,
                                __DIR__ . '/../../../assets/img/atelier_logo.' . $extension
                            );
                            if (is_string($imageName)) {
                                $logo->name = 'atelier_logo';
                                $logo->extension = $extension;
                                if ($logo->save()) {
                                    ResponseHelper::send(RESPONSE_SUCCESS, 'Logo alterada com sucesso');
                                } else {
                                    ResponseHelper::send(RESPONSE_ERROR, 'Não foi possível salvar a nova imagem');
                                }
                            } else {
                                ResponseHelper::send(RESPONSE_ERROR, 'Não foi possível salvar a nova imagem');
                            }
                        } else {
                            ResponseHelper::send(REQUEST_ERROR, 'Formato de imagem inválido');
                        }
                    } else {
                        ResponseHelper::send(REQUEST_ERROR, 'Nenhuma imagem selecionada');
                    }
                } else {
                    ResponseHelper::send(
                        REQUEST_ERROR,
                        'Usuário não tem permissão para editar a logo'
                    );
                }
            } else {
                ResponseHelper::send(
                    RESPONSE_ERROR,
                    'Ocorreu um erro ao verificar as permissões do usuário'
                );
            }
        } else {
            ResponseHelper::send(REQUEST_ERROR, 'Usuário não está logado');
        }
    }

    public function updateLogoIcon(array $data): void {
        $token = $_SERVER['HTTP_TOKEN'];
        if (ValidateHelper::checkToken($token)) {
            $permissions = LevelHelper::getPermissions($token);
            if ($permissions != null) {
                if (LevelHelper::hasEditElementPermission($permissions)) {
                    $image = $data['image'];
                    if ($image != null) {
                        $extension = ImageHelper::extensionFromBase64($image);
                        if (is_string($extension)) {
                            $logoIcon = (new SiteImageModel())->find('name = :name', 'name=atelier_logo_icon');
                            if ($logoIcon->count() > 0) {
                                $logoIcon = $logoIcon->fetch();
                                unlink(__DIR__ . '/../../../assets/img/atelier_logo_icon.' . $logoIcon->extension);
                            }
                            $imageName = ImageHelper::base64UrlToFile(
                                $image,
                                __DIR__ . '/../../../assets/img/atelier_logo_icon.' . $extension
                            );
                            if (is_string($imageName)) {
                                $logoIcon->name = 'atelier_logo_icon';
                                $logoIcon->extension = $extension;
                                if ($logoIcon->save()) {
                                    ResponseHelper::send(RESPONSE_SUCCESS, 'Logo de ícone alterada com sucesso');
                                } else {
                                    ResponseHelper::send(RESPONSE_ERROR, 'Não foi possível salvar a nova imagem');
                                }
                            } else {
                                ResponseHelper::send(RESPONSE_ERROR, 'Não foi possível salvar a nova imagem');
                            }
                        } else {
                            ResponseHelper::send(REQUEST_ERROR, 'Formato de imagem inválido');
                        }
                    } else {
                        ResponseHelper::send(REQUEST_ERROR, 'Nenhuma imagem selecionada');
                    }
                } else {
                    ResponseHelper::send(
                        REQUEST_ERROR,
                        'Usuário não tem permissão para editar a logo de ícone'
                    );
                }
            } else {
                ResponseHelper::send(
                    RESPONSE_ERROR,
                    'Ocorreu um erro ao verificar as permissões do usuário'
                );
            }
        } else {
            ResponseHelper::send(REQUEST_ERROR, 'Usuário não está logado');
        }
    }

    public function updateBanner(array $data): void {
        $token = $_SERVER['HTTP_TOKEN'];
        if (ValidateHelper::checkToken($token)) {
            $permissions = LevelHelper::getPermissions($token);
            if ($permissions != null) {
                if (LevelHelper::hasEditElementPermission($permissions)) {
                    $image = $data['image'];
                    if ($image != null) {
                        $extension = ImageHelper::extensionFromBase64($image);
                        if (is_string($extension)) {
                            $logoIcon = (new SiteImageModel())->find('name = :name', 'name=atelier_banner');
                            if ($logoIcon->count() > 0) {
                                $logoIcon = $logoIcon->fetch();
                                unlink(__DIR__ . '/../../../assets/img/atelier_banner.' . $logoIcon->extension);
                            }
                            $imageName = ImageHelper::base64UrlToFile(
                                $image,
                                __DIR__ . '/../../../assets/img/atelier_banner.' . $extension
                            );
                            if (is_string($imageName)) {
                                $logoIcon->name = 'atelier_banner';
                                $logoIcon->extension = $extension;
                                if ($logoIcon->save()) {
                                    ResponseHelper::send(RESPONSE_SUCCESS, 'Banner alterado com sucesso');
                                } else {
                                    ResponseHelper::send(RESPONSE_ERROR, 'Não foi possível salvar a nova imagem');
                                }
                            } else {
                                ResponseHelper::send(RESPONSE_ERROR, 'Não foi possível salvar a nova imagem');
                            }
                        } else {
                            ResponseHelper::send(REQUEST_ERROR, 'Formato de imagem inválido');
                        }
                    } else {
                        ResponseHelper::send(REQUEST_ERROR, 'Nenhuma imagem selecionada');
                    }
                } else {
                    ResponseHelper::send(
                        REQUEST_ERROR,
                        'Usuário não tem permissão para editar o banner'
                    );
                }
            } else {
                ResponseHelper::send(
                    RESPONSE_ERROR,
                    'Ocorreu um erro ao verificar as permissões do usuário'
                );
            }
        } else {
            ResponseHelper::send(REQUEST_ERROR, 'Usuário não está logado');
        }
    }

    public function getLogo(array $data): void {
        $logo = (new SiteImageModel())->find('name = :name', 'name=atelier_logo');
        if ($logo->count() > 0) {
            $logo = $logo->fetch();
            ResponseHelper::send(RESPONSE_SUCCESS, 'Ok', $logo->name . '.' . $logo->extension);
        } else {
            ResponseHelper::send(RESPONSE_ERROR, 'Não foi possível encontrar a logo');
        }
    }

    public function getLogoIcon(array $data): void {
        $logo = (new SiteImageModel())->find('name = :name', 'name=atelier_logo_icon');
        if ($logo->count() > 0) {
            $logo = $logo->fetch();
            ResponseHelper::send(RESPONSE_SUCCESS, 'Ok', $logo->name . '.' . $logo->extension);
        } else {
            ResponseHelper::send(RESPONSE_ERROR, 'Não foi possível encontrar a logo de ícone');
        }
    }

    public function getBanner(array $data): void {
        $logo = (new SiteImageModel())->find('name = :name', 'name=atelier_banner');
        if ($logo->count() > 0) {
            $logo = $logo->fetch();
            ResponseHelper::send(RESPONSE_SUCCESS, 'Ok', $logo->name . '.' . $logo->extension);
        } else {
            ResponseHelper::send(RESPONSE_ERROR, 'Não foi possível encontrar o banner');
        }
    }
}
