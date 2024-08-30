<?php

namespace Source\App\Api;

use Source\Models\Product\Brands;
use Source\Models\Product\Category;
use Source\Models\Product\Product;

class Products extends Api
{
    public static string $KEY_NOT_FOUND_PRODUCT = "KEY_NOT_FOUND_PRODUCT";
    public static string $KEY_NOT_EXIST_PRODUCT = "KEY_NOT_EXIST_PRODUCT";

    public function __construct()
    {
        parent::__construct();
    }

    public function listProducts()
    {
        $products = (new Product())->find()->fetch(true);

        if (!$products) {
            $this->messageProduct(self::$KEY_NOT_EXIST_PRODUCT);
            return;
        }

        $response = [];
        foreach ($products as $product) {
            $response[] = [
                "id" => $product->id,
                "name" => $product->name,
                "price_brl" => $product->price_brl,
                "color" => $product->color,
                "category_id" => $product->category_id,
                //"category" => $product->getCategory(),
                "brand_id" => $product->brand_id,
                //"brand" => $product->getBrand(),
                "size_id" => $product->size_id,
            ];
        }

        $this->success($response);
    }

    public function getProduct(array $data)
    {
        $id = $data["id"];
        $product = (new Product())->findById($id);
        if (!$product) {
            $this->messageProduct(self::$KEY_NOT_EXIST_PRODUCT);
            return;
        }

        $response[] = [
            "id" => $product->id,
            "name" => $product->name,
            "price_brl" => $product->price_brl,
            "color" => $product->color,
            "category_id" => $product->category_id,
            "brand_id" => $product->brand_id,
            "size_id" => $product->size_id,
        ];
        $this->success($response);
    }

    public function createProduct(array $data)
    {
        $this->auth();

        $product = new Product();

        $requiredFields = ["name", "price_brl", "color", "category_id", "brand_id", "size_id"];
        foreach ($requiredFields as $field) {
            if (!isset($data[$field])) {
                $this->error(message: "Está faltando o campo $field");
                die();
            }
        }

        $product->name = $data["name"];
        $product->price_brl = $data["price_brl"];
        $product->color = $data["color"];
        $product->category_id = $data["category_id"];
        $product->brand_id = $data["brand_id"];
        $product->size_id = $data["size_id"];

        if (!$product->createProduct()) {
            $this->error(message: $product->getMessage());
            return;
        }
        $response[] = [
            "id" => $product->id,
            "name" => $product->name,
            "price_brl" => $product->price_brl,
            "color" => $product->color,
            "category_id" => $product->category_id,
            "brand_id" => $product->brand_id,
            "size_id" => $product->size_id,
        ];

        $this->success($response ,message: "Produto criado com sucesso!");
    }

    public function updateProduct(array $data)
    {
        $this->auth();

        $id = $data["id"];

        $instance = new Product();
        $product = $instance->findById($id);
        if (!$product) {
            $this->messageProduct(self::$KEY_NOT_FOUND_PRODUCT);
            return;
        }

        if (isset($data["name"])) {
            $product->name = $data["name"];
            echo $product->name;
        }
        if (isset($data["price_brl"])) {
            $product->price = $data["price"];
        }
        if (isset($data["color"])) {
            $product->color = $data["color"];
        }
        if (isset($data["category_id"])) {
            $product->category_id = $data["category_id"];
        }
        if (isset($data["brand_id"])) {
            $product->brand_id = $data["brand_id"];
        }
        if (isset($data["size_id"])) {
            $product->size_id = $data["size_id"];
        }

        if($product->save()){
            $this->success(message: "Produto atualizado com sucesso!");
        };


    }

    public function deleteProduct(array $data)
    {
        $this->auth();

        $id = $data["id"];
        $product = (new Product())->findById($id);

        if ($product) {
            $product->destroy();
            $this->success(message: "Produto do id: $id foi removido com sucesso!");
        } else {
            $this->messageProduct(self::$KEY_NOT_FOUND_PRODUCT);
        }

    }

    public function listCategories()
    {
        $category = new Category();
        $categories = $category->find()->fetch(true);

        $response = [];
        foreach ($categories as $category) {

            $response[] = $category->data();
        }

        $this->success($response);
    }


    public function messageProduct(string $KEY)
    {
        switch ($KEY) {
            case self::$KEY_NOT_EXIST_PRODUCT:
                $this->success(message: "Não existem produtos cadastrados.");
                break;
            case self::$KEY_NOT_FOUND_PRODUCT:
                $this->error(message: "Produto inexistente.", code: 404);
                break;
        }
    }
}