<?php 

class DatabaseConfiguration {
    private $name;
    private $usersTable;
    private $loginsTable;

    function __construct($name, $usersTable, $loginsTable) {
        $this->setName($name);
        $this->setUsersTable($usersTable);
        $this->setLoginsTable($loginsTable);
    }

    function getName() {
        return $this->name;
    }
    function setName($name) {
        $this->name = $name;
    }
    function getUsersTable() {
        return $this->usersTable;
    }
    function setUsersTable($usersTable) {
        $this->usersTable = $usersTable;
    }
    function getLoginsTable() {
        return $this->loginsTable;
    }
    function setLoginsTable($loginsTable) {
        $this->loginsTable = $loginsTable;
    }
}

?>