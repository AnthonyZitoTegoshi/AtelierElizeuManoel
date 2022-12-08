<?php

namespace App\Model;

use CoffeeCode\DataLayer\DataLayer;

class SiteColorModel extends DataLayer {
    public function __construct() {
        parent::__construct('site_colors', ['name', 'value']);
    }
}
