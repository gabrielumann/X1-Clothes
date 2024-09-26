<?php

namespace Source\Models\Product;

use CoffeeCode\DataLayer\DataLayer;

class Stock extends DataLayer
{
    private $message;
    public function __construct()
    {
        parent::__construct("stock", ["product_id", "quantity"], timestamps: false);
    }
    public function getProductName()
    {
        $product = (new Product())->findById($this->product_id);
        return $product->name;
    }
    public function verifyProductId()
    {
        $instance = new Product();
        $product = $instance->findById($this->product_id);
    }
    public function productOnStock()
    {

    }
    public function getMessage()
    {
        return $this->message;
    }
}