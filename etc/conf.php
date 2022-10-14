<?php

// Verifica se nenhuma sessão está criada
if (session_status() == PHP_SESSION_NONE) {
    // Inicia ou resume uma sessão
    session_start();
}

// Verifica qual é o local em que o código está sendo executado
if ($_SERVER["HTTP_HOST"] == "localhost") {
    // Seta o caminho root
    $_SESSION["ROOT_PATH"] = "http://localhost/AtelierElizeuManoel";
    // Seta o host para conexão com BD
    $_SESSION["CONNECTION"]["HOSTNAME"] = "localhost"; // !change
    // Seta o usuário para conexão com BD
    $_SESSION["CONNECTION"]["USERNAME"] = "anthony";
    // Seta a senha para conexão com BD
    $_SESSION["CONNECTION"]["PASSWORD"] = "123456";
    // Seta o banco de dados para conexão
    $_SESSION["CONNECTION"]["DATABASE"]["NAME"] = "atelier";
} else {
    // Seta o caminho root
    $_SESSION["ROOT_PATH"] = "https://hostdeprojetosdoifsp.gru.br/atelier";
    // Seta o host para conexão com BD
    $_SESSION["CONNECTION"]["HOSTNAME"] = "hostdeprojetosdoifsp.gru.br"; // !change
    // Seta o usuário para conexão com BD
    $_SESSION["CONNECTION"]["USERNAME"] = "hostdeprojetos_atelier";
    // Seta a senha para conexão com BD
    $_SESSION["CONNECTION"]["PASSWORD"] = "wT8p8antps9tumT";
    // Seta o banco de dados para conexão
    $_SESSION["CONNECTION"]["DATABASE"]["NAME"] = "hostdeprojetos_atelier";
}

// Seta a tabela de usuário e seus campos
$_SESSION["CONNECTION"]["DATABASE"]["TABLES"]["USERS"]["NAME"] = "Users";
$_SESSION["CONNECTION"]["DATABASE"]["TABLES"]["USERS"]["FIELDS"] = array("id", "name", "email", "password");

?>