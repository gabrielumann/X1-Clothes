<?php

namespace Source\App\Api;

use Source\Models\Product\Brands;
use Source\Models\Product\Category;
use Source\Models\Product\Product;

class Products extends Api
{
    public function __construct()
    {
        parent::__construct();
    }

    public function listProducts(){
        $products = (new Product())->find()->fetch(true);

        if(!$products){
            $this->success(message: "Não existem produtos cadastrados.");
            die();
        }

        $response = [];
        foreach($products as $product){
            $response[] = [
                "id" => $product->id,
                "name" => $product->name,
                "price" => $product->price,
                "category_id" => $product->category_id,
                "brand_id" => $product->brand_id,
            ];
        }

        $this->success($response);
    }


    public function getProduct(array $data){
        $id = $data["id"];
        $product = (new Product())->findById($id);
        if(!$product){
            $this->error(message: "Produto inexistente.");
            die();
        }

        $response[] = [
            "id" => $product->id,
            "name" => $product->name,
            "price" => $product->price,
            "category_id" => $product->category_id,
            "brand_id" => $product->brand_id,
        ];
        $this->success($response);
    }

    public function updateProduct(array $data){
        $id = $data["id"];
        $product = (new Product())->findById($id);
        if(!$product){
            $this->error(message: "Produto inexistente.");
            die();
        }

        $product->name = $data["name"];
        $product->price = $data["price"];
        $product->category_id = $data["category_id"];
        $product->brand_id = $data["brand_id"];
        $product->save();
        if(!$product->save()){

        }


        $this->success($data);
    }


    public function deleteProduct(array $data){
        $this->success($data);
    }


    public function listCategories()
    {
        $category = new Category();
        $categories = $category->find()->fetch(true);

        $response = [];
        foreach($categories as $category){

            $response[] = $category->data();
        }

        $this->success($response);
    }

    public function isUserAuth(): bool
    {
        return $this->userAuth;
    }

}