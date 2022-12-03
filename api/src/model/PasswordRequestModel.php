<?php

namespace App\Model;

use CoffeeCode\DataLayer\DataLayer;

class PasswordRequestModel extends DataLayer {
    public function __construct() {
        parent::__construct('password_requests', ['email', 'token', 'expire_date']);
    }
}
