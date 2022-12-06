<?php

namespace App\Model;

use CoffeeCode\DataLayer\DataLayer;

class SitePhraseModel extends DataLayer {
    public function __construct() {
        parent::__construct('site_phrases', ['text']);
    }
}
