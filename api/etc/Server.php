<?php

namespace Configuration;

class Server {
    static function getApiUrl(): string {
        if ($_SERVER['HTTP_HOST'] == 'localhost') {
            return 'http://localhost/AtelierElizeuManoel/api';
        } else {
            return 'https://hostdeprojetosdoifsp.gru.br/atelier/api';
        }
    }

    static function getRootUrl(): string {
        if ($_SERVER['HTTP_HOST'] == 'localhost') {
            return 'http://localhost/AtelierElizeuManoel';
        } else {
            return 'https://hostdeprojetosdoifsp.gru.br/atelier';
        }
    }

    static function getCookiesPath(): string {
        if ($_SERVER['HTTP_HOST'] == 'localhost') {
            return '/AtelierElizeuManoel/';
        } else {
            return '/atelier/';
        }
    }
    
    static function getCookiesDomain(): string {
        if ($_SERVER['HTTP_HOST'] == 'localhost') {
            return 'localhost';
        } else {
            return 'hostdeprojetosdoifsp.gru.br';
        }
    }

    static function getDatabaseName(): string {
        if ($_SERVER['HTTP_HOST'] == 'localhost') {
            return 'atelier';
        } else {
            return 'hostdeprojetos_atelier';
        }
    }

    static function getDatabaseHost(): string {
        if ($_SERVER['HTTP_HOST'] == 'localhost') {
            return 'localhost';
        } else {
            return '51.79.72.47';
        }
    }

    static function getDatabaseUser(): string {
        if ($_SERVER['HTTP_HOST'] == 'localhost') {
            return 'anthony';
        } else {
            return 'hostdeprojetos_atelier';
        }
    }

    static function getDatabasePassword(): string {
        if ($_SERVER['HTTP_HOST'] == 'localhost') {
            return '123456';
        } else {
            return 'wT8p8antps9tumT';
        }
    }

    static function getEmailHost(): string {return 'smtp.gmail.com';
        if ($_SERVER['HTTP_HOST'] == 'localhost') {
            return 'smtp.gmail.com';
        } else {
            return 'mail.hostdeprojetosdoifsp.gru.br';
        }
    }

    static function getEmailPort(): string {
        if ($_SERVER['HTTP_HOST'] == 'localhost') {
            return 587;
        } else {
            return 465;
        }
    }

    static function getEmailUsername(): string {return 'aztegoshi@gmail.com';
        if ($_SERVER['HTTP_HOST'] == 'localhost') {
            return 'aztegoshi@gmail.com';
        } else {
            return 'atelier@hostdeprojetosdsoifsp.gru.br';
        }
    }

    static function getEmailPassword(): string {return 'rruvzaoyyeccixbj';
        if ($_SERVER['HTTP_HOST'] == 'localhost') {
            return 'rruvzaoyyeccixbj';
        } else {
            return 'mnDvR4zZZ4V5chH';
        }
    }
}
