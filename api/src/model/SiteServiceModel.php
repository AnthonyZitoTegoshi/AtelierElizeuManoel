<?php

namespace App\Model;

use CoffeeCode\DataLayer\DataLayer;

class SiteServiceModel extends DataLayer {
    public function __construct() {
        parent::__construct('site_services', ['image', 'title', 'description']);
    }
}
