<?php

namespace Source\Models\Product;

use CoffeeCode\DataLayer\DataLayer;

class ProductImage extends DataLayer
{
    static string $PRINCIPAL = "PRINCIPAL";
    static string $SECONDARY = "SECONDARY";
    public function __construct()
    {
        //string $entity, array $required, string $primary = 'id', bool $timestamps = true, array $database = null
        parent::__construct("product_images", ["image" ,"type" ,"product_id"], timestamps: false);
    }
}