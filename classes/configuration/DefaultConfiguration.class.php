<?php 

class DefaultConfiguration {
    private $rootPath;
    private $cookiesDomain;
    private $cookiesPath;
    private $connection;

    function __construct($rootPath, $cookiesDomain, $cookiesPath, $connection) {
        $this->setRootPath($rootPath);
        $this->setCookiesDomain($cookiesDomain);
        $this->setCookiesPath($cookiesPath);
        $this->setConnection($connection);
    }

    function getRootPath() {
        return $this->rootPath;
    }
    function setRootPath($rootPath) {
        $this->rootPath = $rootPath;
    }
    function getCookiesDomain() {
        return $this->cookiesDomain;
    }
    function setCookiesDomain($cookiesDomain) {
        $this->cookiesDomain = $cookiesDomain;
    }
    function getCookiesPath() {
        return $this->cookiesPath;
    }
    function setCookiesPath($cookiesPath) {
        $this->cookiesPath = $cookiesPath;
    }
    function getConnection() {
        return $this->connection;
    }
    function setConnection($connection) {
        $this->connection = $connection;
    }
}

?>