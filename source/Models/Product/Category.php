<?php

namespace Source\Models\Product;

use CoffeeCode\DataLayer\DataLayer;

class Category extends DataLayer
{
    public function __construct()
    {
        parent::__construct("product_categories", ["name"], timestamps: false);
    }
}