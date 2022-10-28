<?php

// Requer o arquivo de autoloading
require_once(__DIR__ . "/autoload.php");

// Verifica se nenhuma sessão está criada
if (session_status() == PHP_SESSION_NONE) {
    // Inicia ou resume uma sessão
    session_start();
}

// Seta a tabela de usuário e seus campos
$usersTable = new TableConfiguration("Users", array("id", "name", "email", "password"));
// Seta a tabela de logins e seus campos
$loginsTable = new TableConfiguration("Logins", array("id", "userId", "token", "expireDate"));

// Verifica qual é o local em que o código está sendo executado
if ($_SERVER["HTTP_HOST"] == "localhost") {
    // Seta o banco de dados para conexão
    $databaseConfiguration = new DatabaseConfiguration("atelier", $usersTable, $loginsTable);
    // Seta as configurações de conexão
    $connectionConfiguration = new ConnectionConfiguration("localhost", "anthony", "123456", $databaseConfiguration); // !change
    // Seta as configurações padrão do site
    $defaultConfiguration = new DefaultConfiguration("http://localhost/AtelierElizeuManoel", "localhost", "/AtelierElizeuManoel/", $connectionConfiguration);
} else {
    // Seta o banco de dados para conexão
    $databaseConfiguration = new DatabaseConfiguration("hostdeprojetos_atelier", $usersTable, $loginsTable);
    // Seta as configurações de conexão
    $connectionConfiguration = new ConnectionConfiguration("hostdeprojetosdoifsp", "hostdeprojetos_atelier", "wT8p8antps9tumT", $databaseConfiguration); // !change
    // Seta as configurações padrão do site
    $defaultConfiguration = new DefaultConfiguration("https://hostdeprojetosdoifsp.gru.br/atelier", "hostdeprojetosdoifsp.gru.br", "/atelier/", $connectionConfiguration); // !change
}

$_SESSION["CONFIGURATION"] = $defaultConfiguration;

?>