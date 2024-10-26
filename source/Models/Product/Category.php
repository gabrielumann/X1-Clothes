<?php

namespace Source\Models\Product;

use CoffeeCode\DataLayer\DataLayer;

class Category extends DataLayer
{
    private $message;
    public function __construct()
    {
        parent::__construct("product_categories", ["name"], timestamps: false);
    }
    public function createCategory(): bool
    {
        $params = http_build_query(["name" => $this->name]);
        $product = $this->find("name = :name", $params);
        $product->fetch(true);

        if ($product->count() == 1) {
            $this->message = "Ja existe uma categoria com esse nome";
            return false;
        };

        return parent::save();
    }
    public function getMessage()
    {
        return $this->message;
    }
}