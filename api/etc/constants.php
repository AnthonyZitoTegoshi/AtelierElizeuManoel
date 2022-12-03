<?php

use Configuration\Server;

define(
    'DATA_LAYER_CONFIG',
    [
        'driver' => 'mysql',
        'host' => Server::getDatabaseHost(),
        'port' => '3306',
        'dbname' => Server::getDatabaseName(),
        'username' => Server::getDatabaseUser(),
        'passwd' => Server::getDatabasePassword(),
        'options' => [
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
            PDO::ATTR_CASE => PDO::CASE_NATURAL
        ]
    ]
);

define(
    'EMAIL_CONFIG',
    [
        'host' => 'smtp.gmail.com',
        'port' => 587,
        'encryption' => 'tls',
        'auth' => true,
        'username' => 'aztegoshi@gmail.com',
        'password' => 'kaqixgxmaualevth',
    ]
);

define('DEFAULT_DATETIME_FORMAT', 'Y-m-d H:i:s');

define('RESPONSE_ERROR', -1);
define('REQUEST_ERROR', 0);
define('RESPONSE_SUCCESS', 1);