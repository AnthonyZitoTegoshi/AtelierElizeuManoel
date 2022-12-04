<?php

namespace App\Model;

use CoffeeCode\DataLayer\DataLayer;

class SiteImageModel extends DataLayer {
    public function __construct() {
        parent::__construct('site_images', ['name', 'extension']);
    }
}
