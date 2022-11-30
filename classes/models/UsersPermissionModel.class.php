<?php

    class UsersPermissionModel{
        private $permissionId;
        private $permissionName; 
        private $permissionType; 
        private $id;
        
        function function_name() {
            ;
        }    
    
    public function getPermissionId(){
        return $this->permissionId;
    }

    public function setPermissionId($permissionId){
        $this->permissionId = $permissionId;
        return $this;
    }

    public function getPermissionName(){
        return $this->permissionName;
    }

    public function setPermissionName($permissionName){
        $this->permissionName = $permissionName;
        return $this;
    }

    public function getPermissionType(){
        return $this->permissionType;
    }

    public function setPermissionType($permissionType){
        $this->permissionType = $permissionType;
        return $this;
    }

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
        return $this;
    }

}


?>