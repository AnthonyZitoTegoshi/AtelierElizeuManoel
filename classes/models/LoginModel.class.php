<?php 

class LoginModel {
    private $id;
    private $userId;
    private $token;
    private $expireDate;

    function __construct($id, $userId, $token, $expireDate) {
        $this->setId($id);
        $this->setUserId($userId);
        $this->setToken($token);
        $this->setExpireDate($expireDate);
    }

    function getValues() {
        return array($this->getId(), $this->getUserId(), $this->getToken(), $this->getExpireDate());
    }

    function getId() {
        return $this->id;
    }
    function setId($id) {
        $this->id = $id;
    }
    function getUserId() {
        return $this->userId;
    }
    function setUserId($userId) {
        $this->userId = $userId;
    }
    function getToken() {
        return $this->token;
    }
    function setToken($token) {
        $this->token = $token;
    }
    function getExpireDate() {
        return $this->expireDate;
    }
    function setExpireDate($expireDate) {
        $this->expireDate = $expireDate;
    }
}

?>