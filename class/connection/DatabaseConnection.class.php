<?php

// Requer o arquivo de configuração com informações globais
require_once(__DIR__ . "/../../etc/conf.php");
// Requer o arquivo de autoloading
require_once(__DIR__ . "/../../etc/autoload.php");

// Classe para conexão com o banco de dados
class DatabaseConnection {
    // Host para conexão com BD
    private $hostname;
    // Usuário para conexão com BD
    private $username;
    // Senha para conexão com BD
    private $password;
    // Banco de dados para conexão
    private $database;
    // Conexão armazenada numa variável
    private $connection;

    // Construtor para criar a classe, gerando uma conexão
    function __construct() {
        // Seta o host para conexão com BD
        $this->setHostname($_SESSION["CONNECTION"]["HOSTNAME"]);
        // Seta o usuário para conexão com BD
        $this->setUsername($_SESSION["CONNECTION"]["USERNAME"]);
        // Seta a senha para conexão com BD
        $this->setPassword($_SESSION["CONNECTION"]["PASSWORD"]);
        // Seta o banco de dados para conexão
        $this->setDatabase($_SESSION["CONNECTION"]["DATABASE"]["NAME"]);
        // Cria a conexão com os valores anteriores
        $this->setConnection(new mysqli(
            $this->getHostname(),
            $this->getUsername(),
            $this->getPassword(),
            $this->getDatabase()
        ));
    }

    // Shorthand para fazer uma query
    function query($query) {
        $result = $this->getConnection()->query($query);
        if ($result === TRUE || $result === FALSE) {
            return $result;
        }
        return $result->fetch_all();
    }

    // Shorthand para encerrar a conexão
    function close() {
        return $this->getConnection()->close();
    }

    // Getters e setters
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
    function getConnection() {
        return $this->connection;
    }
    function setConnection($connection) {
        $this->connection = $connection;
    }
}

?>