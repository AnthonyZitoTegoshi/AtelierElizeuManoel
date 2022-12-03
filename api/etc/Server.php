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
            return 'hostdeprojetosdoifsp'; // !change
        }
    }

    static function getDatabaseUser(): string {
        if ($_SERVER['HTTP_HOST'] == 'localhost') {
            return 'root';
        } else {
            return 'hostdeprojetos_atelier';
        }
    }

    static function getDatabasePassword(): string {
        if ($_SERVER['HTTP_HOST'] == 'localhost') {
            return 'Thiluma@37';
        } else {
            return 'wT8p8antps9tumT';
        }
    }
}
