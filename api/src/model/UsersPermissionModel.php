<?php

namespace App\Model;

use CoffeeCode\DataLayer\DataLayer;

class UsersPermissionModel extends DataLayer{
    public function __construct(){
        parent::__construct('UserPermissions',['permissionId', 'permissionName', 'permissionType']);
    }
        
        
}      