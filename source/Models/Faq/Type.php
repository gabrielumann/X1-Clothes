<?php

namespace Source\Models\Faq;

use CoffeeCode\DataLayer\DataLayer;

class Type extends DataLayer
{
    public function __construct()
    {
        parent::__construct("faq_categories", ["description"], "", false);
    }
}