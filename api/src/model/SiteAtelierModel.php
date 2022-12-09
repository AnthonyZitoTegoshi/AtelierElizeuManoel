<?php

namespace App\Model;

use CoffeeCode\DataLayer\DataLayer;

class SiteAtelierModel extends DataLayer {
    public function __construct() {
        parent::__construct('site_atelier', ['image', 'title', 'description']);
    }
}
