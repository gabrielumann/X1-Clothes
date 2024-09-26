<?php

namespace Source\Models\Product;

use CoffeeCode\DataLayer\DataLayer;

class Brand extends DataLayer
{
    private $message;
    public function __construct()
    {
        parent::__construct("brands", ["name"], timestamps: false);
    }
    public function createBrand(): bool
    {
        $params = http_build_query(["name" => $this->name]);
        $product = $this->find("name = :name", $params);
        $product->fetch(true);

        if ($product->count() == 1) {
            $this->message = "Ja existe esse nome!";
            return false;
        };

        return parent::save();
    }
    public function getMessage()
    {
        return $this->message;
    }
}