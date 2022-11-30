<?php

// Requer o arquivo de configuração com informações globais
require_once(__DIR__ . "/../../etc/conf.php");
// Requer a classe Dao sem ajuda do autoload
require_once(__DIR__ . "/Dao.class.php");

// Classe para executar as queries na conexão com BD
class UserDao extends Dao {
    // Construtor para setar os atributos para valores iniciais
    function __construct($values = array(), $complement = "") {
        $tablename = $_SESSION["CONFIGURATION"]->getConnection()->getDatabase()->getUsersTable()->getName();
        $fields = $_SESSION["CONFIGURATION"]->getConnection()->getDatabase()->getUsersTable()->getFields();
        parent::__construct($tablename, $fields, $values, $complement);
    }
}

?>