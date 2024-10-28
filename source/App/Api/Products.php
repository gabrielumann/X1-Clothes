<?php

namespace Source\App\Api;

use Source\Models\Product\Brand;
use Source\Models\Product\Category;
use Source\Models\Product\Product;
use Source\Models\Product\ProductImage;
use Source\Models\Product\Size;

class Products extends Api
{
    private const ALLOWED_IMAGES = [
        "principal_image",
        "additional_image_1",
        "additional_image_2",
        "additional_image_3",
        "additional_image_4"
    ];
    private static string $CLASSNAME = "produto";

    public function __construct()
    {
        parent::__construct();
    }

    public function listProducts()
    {
        $products = (new Product())->find()->fetch(true);
        $categories = new Category();
        $sizes = new Size();
        $brand = new Brand();
        if (!$products) {
            parent::message( self::$CLASSNAME, parent::$KEY_NOT_EXIST);
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
                "category" => $product->getName($categories, "category_id"),
                "brand_id" => $product->brand_id,
                "brand" => $product->getName($brand, "brand_id"),
                "size_id" => $product->size_id,
                "size" => $product->getName($sizes, "size_id"),
                "product_image" => ($product->getImage()) ? $product->getImage() : $product->getMessage()
            ];
        }

        $this->success($response);
    }

    public function getProduct(array $data)
    {
        $id = $data["id"];
        $product = (new Product())->findById($id);
        $categories = new Category();
        $sizes = new Size();
        $brand = new Brand();

        if (!$product) {
            parent::message( self::$CLASSNAME, parent::$KEY_NOT_EXIST);
            return;
        }

        $response[] = [
            "id" => $product->id,
            "name" => $product->name,
            "price_brl" => $product->price_brl,
            "color" => $product->color,
            "category" => $product->category_id,
            "brand" => $product->brand_id,
            "size" => $product->size_id,
            "product_image" => ($product->getImage()) ? $product->getImage() : $product->getMessage()
        ];

        $this->success($response);
    }

    public function createProduct(array $data)
    {
        //echo json_encode($data);
//        echo json_encode($_FILES["principal_image"]);
//        for($i = 1; $i <= 4; $i++){
//            echo json_encode($_FILES["additional_image_$i"]);
//        }

        //$this->auth();
        //$this->authAdmin();

        $product = new Product();

        $requiredFields = ["name", "price_brl", "color", "category_id", "brand_id", "size_id"];
        foreach ($requiredFields as $field) {
            if (!isset($data[$field])) {
                $this->error(message: "Está faltando o campo '$field'");
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
        self::changeDirectory(function () use ($product) {
            $this->handleProductImages($product);
        });

        $response[] = [
            "id" => $product->id,
            "name" => $product->name,
            "price_brl" => $product->price_brl,
            "color" => $product->color,
            "category_id" => $product->category_id,
            "brand_id" => $product->brand_id,
            "size_id" => $product->size_id,
            "product_image" => ($product->getImage()) ? $product->getImage() : $product->getMessage()
        ];

        $this->success($response ,message: "Produto criado com sucesso!");

    }

    public function updateProduct(array $data)
    {
        //$this->auth();
        //echo json_encode($data);
        $product_id = $data["id"];

        $instance = new Product();
        $product = $instance->findById($product_id);
        if (!$product) {
            parent::message( self::$CLASSNAME, parent::$KEY_NOT_FOUND);
            return;
        }
        $product->setData($data);
        self::changeDirectory(function () use ($product) {
            $this->handleProductImages($product, true);
        });
        if($product->save()){
            $response[] = [
                "id" => $product->id,
                "name" => $product->name,
                "price_brl" => $product->price_brl,
                "color" => $product->color,
                "category_id" => $product->category_id,
                "brand_id" => $product->brand_id,
                "size_id" => $product->size_id,
                "product_image" => ($product->getImage()) ? $product->getImage() : $product->getMessage()
            ];
            $this->success($response, message: "Produto atualizado com sucesso!");
        };
    }

    public function deleteProduct(array $data)
    {
        //$this->auth();

        $id = $data["id"];
        $product = (new Product())->findById($id);
        if ($product->getImage()){
            foreach ($product->getImage() as $img){
                //echo json_encode($img);
                if(!$product->deleteImage($img->id, true)){
                    $this->error(message: $product->getMessage());
                    die();
                }
            }
        }
        if ($product->destroy()) {
            $this->success(message: "Produto do id: $id foi removido com sucesso!");
        } else {
            parent::message( self::$CLASSNAME, parent::$KEY_NOT_FOUND);
        }
    }

    public function listImageProducts()
    {
        $images = (new ProductImage())->find()->fetch(true);
        $response = [];
        foreach ($images as $image) {
            $response[] = $image->data();
        }
        $this->success($response);
    }
    private function handleProductImages(Product $product, bool $isUpdate = false): void
    {
        if (isset($_FILES[self::ALLOWED_IMAGES[0]])) {
            if ($isUpdate) {
                $product->updateImage($_FILES[self::ALLOWED_IMAGES[0]], ProductImage::$PRINCIPAL, $product->id);;
            } else {
                $product->saveImage($_FILES[self::ALLOWED_IMAGES[0]], ProductImage::$PRINCIPAL);;
            }
        }

        for ($i = 1; $i < count(self::ALLOWED_IMAGES); $i++) {
            if (isset($_FILES[self::ALLOWED_IMAGES[$i]])) {
                if ($isUpdate) {
                    $product->updateImage($_FILES[self::ALLOWED_IMAGES[$i]], ProductImage::$SECONDARY, $product->id, $i);
                } else {
                    $product->saveImage($_FILES[self::ALLOWED_IMAGES[$i]], ProductImage::$SECONDARY, $i);
                }
            }
        }
    }
}