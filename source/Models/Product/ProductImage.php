<?php

namespace Source\Models\Product;

use CoffeeCode\DataLayer\DataLayer;

class ProductImage extends DataLayer
{
    private $message;
    static string $PRINCIPAL = "PRINCIPAL";
    static string $SECONDARY = "SECONDARY";
    public function __construct()
    {
        //string $entity, array $required, string $primary = 'id', bool $timestamps = true, array $database = null
        parent::__construct("product_images", ["image" ,"type" ,"product_id"], timestamps: false);
    }

    public function addImages(){
        $params = http_build_query(["product_id" => $this->product_id]);
        $image = $this->find("product_id = :product_id", $params);
        $image->fetch(true);

        if($image->count() > 5) {
            $this->message = "Voce já atingiu o limite de fotos!";
            return false;
        };

        return parent::save();
    }

    public function getMessage()
    {
        return $this->message;
    }

}