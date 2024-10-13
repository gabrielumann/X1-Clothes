<?php

namespace Source\Models\Product;

use CoffeeCode\DataLayer\DataLayer;
use PDOException;

class Product extends DataLayer
{
    private $message;

    public function __construct()
    {
        //string $entity, array $required, string $primary = 'id', bool $timestamps = true, array $database = null
        parent::__construct("products", ["name", "price_brl", "color", "category_id", "brand_id", "size_id"], timestamps: false);
    }

    public function getImage()
    {
        $images = (new ProductImage())->find("product_id = :pid", "pid={$this->id}")->fetch(true);
        if (!is_array($images)) {
            $this->message = "Não existem imagens deste produto!";
            return false;
        }
        foreach ($images as $image) {
            $response[] = $image->data();
        }
        return $response;

    }
    public function getName ($instance, $field)
    {
        $temp = ($instance)->findById($this->$field);
        if($temp){
            return $temp->name;
        }
        return null;
    }

    public function createProduct(): bool
    {
        $params = http_build_query(["name" => $this->name]);
        $product = $this->find("name = :name", $params);
        $product->fetch(true);

        if ($product->count() == 1) {
            $this->message = "Ja existe um produto com esse nome";
            return false;
        };

        return parent::save();
    }

    public function getMessage()
    {
        return $this->message;
    }
}