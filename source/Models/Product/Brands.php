<?php

namespace Source\Models\Product;

use CoffeeCode\DataLayer\DataLayer;

class Brands extends DataLayer
{
    public function __construct()
    {
        parent::__construct("brands", ["name"], timestamps: false);
    }

}