<?php

namespace Source\Models\Faq;

use CoffeeCode\DataLayer\DataLayer;

class Type extends DataLayer
{
    private $message;
    public function __construct()
    {
        parent::__construct("faq_categories", ["description"], timestamps: false);
    }

    public function createType(): bool
    {
        $params = http_build_query(["description" => $this->description]);
        $product = $this->find("description = :description", $params);
        $product->fetch(true);

        if ($product->count() == 1) {
            $this->message = "Ja existe faq com essa descrição";
            return false;
        };

        return parent::save();
    }

    public function getMessage()
    {
        return $this->message;
    }
}