<?php

// autoload_psr4.php @generated by Composer

$vendorDir = dirname(__DIR__);
$baseDir = dirname($vendorDir);

return array(
    'PHPMailer\\PHPMailer\\' => array($vendorDir . '/phpmailer/phpmailer/src'),
    'Configuration\\' => array($baseDir . '/etc'),
    'CoffeeCode\\Router\\' => array($vendorDir . '/coffeecode/router/src'),
    'CoffeeCode\\DataLayer\\' => array($vendorDir . '/coffeecode/datalayer/src'),
    'App\\Model\\' => array($baseDir . '/src/model'),
    'App\\Helper\\' => array($baseDir . '/src/helper'),
    'App\\Controller\\' => array($baseDir . '/src/controller'),
    'App\\' => array($baseDir . '/src'),
);
