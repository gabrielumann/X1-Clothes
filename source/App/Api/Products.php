<?php

namespace Source\App\Api;

use Source\Models\Product\Brand;
use Source\Models\Product\Category;
use Source\Models\Product\Product;
use Source\Models\Product\ProductImage;
use Source\Models\Product\Size;

class Products extends Api
{
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
            parent::message( self::$CLASSNAME, parent::$KEY_NOT_FOUND);
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
        if (!$product) {
            parent::message( self::$CLASSNAME, parent::$KEY_NOT_EXIST);
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

        chdir("..");


        if ($_FILES['product-image']['size'] > 5000000) { // 5MB
            $this->error(message: "O arquivo é muito grande.");
            return;
        }
        if (isset($_FILES['product-image']) && $_FILES['product-image']['error'] === UPLOAD_ERR_OK) {
            $this->addProductImage($product->id, $_FILES['product-image'], "PRINCIPAL");
        }else{
            $this->error(message: 'Erro ao fazer upload da imagem principal');
            return;
        }
        if (isset($_FILES['comp-images'])) {
            for ($i = 0; $i < count($_FILES['comp-images']['name']); $i++) {
                if ($_FILES['comp-images']['size'][$i] > 5000000) { // 5MB
                    $this->error(message: "O arquivo $i é muito grande.");
                    continue;
                }

                if ($_FILES['comp-images']['error'][$i] === UPLOAD_ERR_OK) {
                    $img = [
                        'name' => $_FILES['comp-images']['name'][$i],
                        'tmp_name' => $_FILES['comp-images']['tmp_name'][$i],
                        'error' => $_FILES['comp-images']['error'][$i],
                        'size' => $_FILES['comp-images']['size'][$i]
                    ];
                    $this->addProductImage($product->id, $img, "SECONDARY");
                } else {
                    $this->error(message: "Erro ao enviar a imagem de índice $i.");
                }
            }
        }

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
        $this->auth();

        $id = $data["id"];

        $instance = new Product();
        $product = $instance->findById($id);
        if (!$product) {
            parent::message( self::$CLASSNAME, parent::$KEY_NOT_FOUND);
            return;
        }

        if (isset($data["name"])) {
            $product->name = $data["name"];
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
            $response[] = $product->data();
            $this->success($response, message: "Produto atualizado com sucesso!");
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

    public function addProductImage( int $productId, array $img, string $type)
    {
        $imageName = basename($img['name']);
        $uniqueName = $type . uniqid() . '_' . str_replace(' ', '_', $imageName);

        if (!move_uploaded_file($img["tmp_name"], "storage/images/products/" . $uniqueName)) {
            $this->error(message: "Erro ao mover o arquivo: " . $img['name']);
            die();
        }

        $images = new ProductImage();
        $images->image = $uniqueName;
        $images->type = $type;
        $images->product_id = $productId;

        if (!$images->addImages()) {
            $this->error(message: $images->getMessage());
            die();
        }

        $this->success(message: "Imagem adicionada com sucesso!");
    }

}