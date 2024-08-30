<?php

namespace Source\Models\Product;

use CoffeeCode\DataLayer\DataLayer;

class Sizes extends DataLayer
{
    public function __construct()
    {
        parent::__construct("sizes", ["name"], timestamps: false);
    }

}