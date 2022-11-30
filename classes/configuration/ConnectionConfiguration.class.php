<?php 

class ConnectionConfiguration {
    private $hostname;
    private $username;
    private $password;
    private $database;

    function __construct($hostname, $username, $password, $database) {
        $this->setHostname($hostname);
        $this->setUsername($username);
        $this->setPassword($password);
        $this->setDatabase($database);
    }

    function getHostname() {
        return $this->hostname;
    }
    function setHostname($hostname) {
        $this->hostname = $hostname;
    }
    function getUsername() {
        return $this->username;
    }
    function setUsername($username) {
        $this->username = $username;
    }
    function getPassword() {
        return $this->password;
    }
    function setPassword($password) {
        $this->password = $password;
    }
    function getDatabase() {
        return $this->database;
    }
    function setDatabase($database) {
        $this->database = $database;
    }
}

?>