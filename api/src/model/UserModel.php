<?php

namespace App\Model;

use CoffeeCode\DataLayer\DataLayer;

class UserModel extends DataLayer {
    public function __construct() {
        parent::__construct('users', ['sid', 'name', 'email', 'password', 'permissionType']);
    }
}
