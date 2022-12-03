<?php

namespace App\Model;

use CoffeeCode\DataLayer\DataLayer;

class LoginModel extends DataLayer {
    public function __construct() {
        parent::__construct('logins', ['user_sid', 'token', 'expire_date']);
    }
}
