<?php 

class UserModel {
    private $id;
    private $permissionId;
    private $name;
    private $email;
    private $password;

    function __construct($id, $name, $email, $password, $permissionId) {
        $this->setId($id);
        $this->setName($name);
        $this->setEmail($email);
        $this->setPassword($password);
        $this->setPermissionId($permissionId);
    }

    function getValues() {
        return array($this->getId(), $this->getPermissionId(), $this->getName(), $this->getEmail(), $this->getPassword());
    }

    function getId() {
        return $this->id;
    }
    function setId($id) {
        $this->id = $id;
    }
    function setPermissionId($permissionId){
        $this->permissionId = $permissionId;
    }
    function getPermissionId() {
        return $this->permissionId;
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

$batata = new UserModel(1,2,3,4,5);
$batata->setPassword(12345);


?>