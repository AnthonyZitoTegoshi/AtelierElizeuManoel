<?php

require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/etc/constants.php';

use App\Helper\ResponseHelper;
use Configuration\Server as Server;
use CoffeeCode\Router\Router as Router;

try {
    $router = new Router(Server::getApiUrl());

    $router->namespace('App\\Controller');
    $router->post('/login', 'LoginController:create');

    $router->dispatch();

    if ($router->error() !== null) {
        ResponseHelper::send(
            REQUEST_ERROR,
            'Erro ' . $router->error(),
        );
    }
} catch (Throwable $e) {
    ResponseHelper::send(
        RESPONSE_ERROR,
        $e,
    );
}
