<?php

require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/etc/constants.php';

use App\Helper\GenerateHelper as GenerateHelper;
use Configuration\Server as Server;
use CoffeeCode\Router\Router as Router;
use App\Helper\ResponseHelper as ResponseHelper;

try {
    /*echo GenerateHelper::randomToken();/**/
    $router = new Router(Server::getApiUrl());

    $router->namespace('App\\Controller');

    $router->post('/login', 'LoginController:login');
    $router->delete('/login', 'LoginController:logout');
    $router->get('/login', 'LoginController:isLogged');
    
    $router->post('/service', 'SiteServiceController:create');
    $router->put('/service', 'SiteServiceController:update');
    $router->delete('/service', 'SiteServiceController:delete');
    $router->get('/service', 'SiteServiceController:read');

    
    $router->get('/user', 'UserController:view');
    $router->post('/user', 'UserController:add');
    $router->delete('/user', 'UserController:remove');
    $router->post('/user/register-modify', 'UserController:modify');
    $router->post('/user/request-password', 'UserController:requestPassword');
    $router->put('/user/reset-password', 'UserController:resetPassword');

    $router->put('/image/atelier-logo', 'SiteImageController:updateLogo');
    $router->put('/image/atelier-logo-icon', 'SiteImageController:updateLogoIcon');
    $router->put('/image/atelier-banner', 'SiteImageController:updateBanner');
    $router->get('/image/atelier-logo', 'SiteImageController:getLogo');
    $router->get('/image/atelier-logo-icon', 'SiteImageController:getLogoIcon');
    $router->get('/image/atelier-banner', 'SiteImageController:getBanner');

    $router->dispatch();

    if ($router->error() !== null) {
        ResponseHelper::send(REQUEST_ERROR, 'Erro ' . $router->error());
    }
} catch (Throwable $e) {
    ResponseHelper::send(RESPONSE_ERROR, $e);
}
