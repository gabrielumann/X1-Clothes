<?php

namespace Source\Models\Product;

use CoffeeCode\DataLayer\DataLayer;

class Stock extends DataLayer
{
    private $message;
    private $instace;
    public function __construct()
    {
        parent::__construct("stock", ["product_id", "quantity"], timestamps: false);
    }
    public function getProductName()
    {
        $product = (new Product())->findById($this->product_id);
        return $product->name;
    }
    public function verifyProductId(int $id)
    {
        $instance = new Product();
        $product = $instance->findById($id);
        if (!$product) {
            $this->message = "Este produto não existe!";
            return false;
        }
        return true;
    }
    public function productOnStock(int $id)
    {
        $params = http_build_query(["product_id" => $id]);
        $stock = $this->find("product_id = :product_id", $params);
        $stock->fetch(true);

        if($stock->count() == 1) {
            $this->message = "Este produto existe!";
            return $stock;
        }
        $this->message = "Este produto não existe!";
        return false;
    }
    public function getQuantity(int $id)
    {
        $params = http_build_query(["product_id" => $id]);
        $stock = $this->find("product_id = :product_id", $params)->fetch();
        return $stock->quantity;
    }
    public function getMessage()
    {
        return $this->message;
    }

}