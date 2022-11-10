<?php 

class UserModel {
    private $id;
    private $userLevel;
    private $name;
    private $email;
    private $password;

    function __construct($id, $name, $email, $password, $userLevel) {
        $this->setId($id);
        $this->setName($name);
        $this->setEmail($email);
        $this->setPassword($password);
        $this->setUserLevel($userLevel);
    }

    function getValues() {
        return array($this->getId(), $this->getUserLevel(), $this->getName(), $this->getEmail(), $this->getPassword());
    }

    function getId() {
        return $this->id;
    }
    function setId($id) {
        $this->id = $id;
    }
    function setUserLevel($userLevel){
        $this->id = $userLevel;
    }
    function getUserLevel() {
        return $this->userLevel;
    }
    function getName() {
        return $this->name;
    }
    function setName($name) {
        $this->name = $name;
    }
    function getEmail() {
        return $this->email;
    }
    function setEmail($email) {
        $this->email = $email;
    }
    function getPassword() {
        return $this->password;
    }
    function setPassword($password) {
        $this->password = $password;
    }
}

?>