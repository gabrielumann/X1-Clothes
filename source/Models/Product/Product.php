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
    public function setData($data): void
    {
        if (isset($data["name"])) {
            $this->name = $data["name"];
        }
        if (isset($data["price_brl"])) {
            $this->price = $data["price_brl"];
        }
        if (isset($data["color"])) {
            $this->color = $data["color"];
        }
        if (isset($data["category_id"])) {
            $this->category_id = $data["category_id"];
        }
        if (isset($data["brand_id"])) {
            $this->brand_id = $data["brand_id"];
        }
        if (isset($data["size_id"])) {
            $this->size_id = $data["size_id"];
        }
    }
    private function generateName($imageFile, $type)
    {
        $imageName = basename($imageFile['name']);
        return $type . uniqid() . '_' . str_replace(' ', '_', $imageName);
    }
    private function storageUploadImage($imageFile, $name)
    {
        if (!move_uploaded_file($imageFile["tmp_name"], "storage/images/products/" . $name)) {
            $this->message = "Erro ao mover o arquivo: " . $imageFile['name'];
            return false;
        }

        return $name;
    }
    public function verifySize($imgFile)
    {
        if ($imgFile['size'] > 5000000) { // 5MB
            $this->message = "Imagem muito grande";
            return false;
        }
        return true;
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

    public function SaveImage(array $imageFile, string $type, $order = null): void
    {
        if(!$this->verifySize($imageFile)){
            return;
        }
        $productId = $this->id;
        $uniqueName = $this->generateName($imageFile, $type);
        $upload = $this->storageUploadImage($imageFile, $uniqueName);
        if ($upload){
            $productImages = new ProductImage();
            $productImages->product_id = $productId;
            $productImages->image = $upload;
            $productImages->type = $type;
            $productImages->complementary_order = $order;

            if (!$productImages->addImages()) {
                $this->message = $productImages->getMessage();
            }
        }
    }
    public function findImage($product_id, $type, $order = false)
    {
        if ($order){
            $params = http_build_query(["product_id" => $product_id, "type" => $type, "order" => $order]);
            $productImage =  (new ProductImage())->find("product_id = :product_id AND type = :type AND complementary_order = :order", $params)->fetch();
            if ($productImage){
                return $productImage;
            }

        }else{
            $params = http_build_query(["product_id" => $product_id, "type" => $type]);
            $productImage = (new ProductImage())->find("product_id = :product_id AND type = :type", $params)->fetch();
            if ($productImage){
                return $productImage;
            }

        }
        return null;
    }
    public function UpdateImage($imageFile, $type, $order = null)
    {
        if(!$this->verifySize($imageFile)){
            return false;
        }

        $product_id = $this->id;
        if ($type === ProductImage::$SECONDARY && $order == null) {
            $this->message = "Se o type for $type você tem que passar um valor para order";
            return false;
        }

        if ($type === ProductImage::$PRINCIPAL) {
            $imageFound = $this->findImage($product_id, $type);
            //echo json_encode($imageFound);
            if (!$imageFound) {
                $this->saveImage($imageFile, $type);
                return true;
            }

            $this->deleteImage($imageFound->id, true);

            $upload = $this->storageUploadImage($imageFile, $imageFound->image);
            if(!$upload){
                return false;
            }
            $imageFound->image = $upload;
            $imageFound->save();
            return true;
        }

        if ($type === ProductImage::$SECONDARY) {
            $params = http_build_query(["product_id" => $product_id, "type" => $type, "order" => $order]);
            $ImageFound = (new ProductImage())->find("product_id = :product_id AND type = :type AND complementary_order = :order", $params)->fetch();
            if ($ImageFound === null) {
                $this->saveImage($imageFile, $type);
                return true;
            }
            $this->deleteImage($ImageFound->id, true);
            $upload = $this->storageUploadImage($imageFile, $product_id);

            $ImageFound->image = $upload;
            $ImageFound->save();
        }
        return false;
    }
    public function deleteImage($imageId, bool $deleteOnDatabase = false)
    {
        $image = (new ProductImage())->findById($imageId);
        if (!$image) {
            $this->message = "Não existe um imagem com esse ID.";
            return false;
        }
        $pathCurrentImage = "storage/images/products/" . $image->image;
            if (unlink($pathCurrentImage)) {
                $this->message = "Arquivo excluído com sucesso.";
            } else {
                $this->message =  "Erro ao excluir o arquivo de caminho $pathCurrentImage.";
                return false;
            }


        if ($deleteOnDatabase) {
            if (!$image->destroy()) {
                $this->message = "Erro ao apagar a imagem!";
                return false;
            }
            $this->message = "Imagem: $image->image foi removida com sucesso!";
        }
        return true;
    }

    public function getMessage()
    {
        return $this->message;
    }
}