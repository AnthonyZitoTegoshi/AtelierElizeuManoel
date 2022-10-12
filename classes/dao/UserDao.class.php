<?php

// Requer o arquivo de configuração com informações globais
require_once(__DIR__ . "/../../etc/conf.php");

// Classe para executar as queries na conexão com BD
class UserDao extends Dao {
    // Construtor para setar os atributos para valores iniciais
    function __construct($values = array(), $complement = "") {
        $tablename = $_SESSION["CONNECTION"]["DATABASE"]["TABLES"]["USERS"]["NAME"];
        $fields = $_SESSION["CONNECTION"]["DATABASE"]["TABLES"]["USERS"]["FIELDS"];
        parent::__construct($tablename, $fields, $values, $complement);
    }
}

?>