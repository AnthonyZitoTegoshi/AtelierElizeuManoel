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
    
    $router->post('/service', 'ServiceController:create');
    $router->put('/service', 'ServiceController:update');
    $router->delete('/service', 'ServiceController:delete');
    $router->get('/service', 'ServiceController:read');

    $router->post('/user/request-password', 'UserController:requestPassword');

    $router->dispatch();

    if ($router->error() !== null) {
        ResponseHelper::send(REQUEST_ERROR, 'Erro ' . $router->error());
    }
} catch (Throwable $e) {
    ResponseHelper::send(RESPONSE_ERROR, $e);
}
