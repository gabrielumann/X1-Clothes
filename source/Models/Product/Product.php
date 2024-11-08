<?php

namespace Source\Models\Product;

use CoffeeCode\DataLayer\DataLayer;
use PDOException;
use Source\Support\ImageUploader;

class Product extends DataLayer
{
    private static $DIR = 'products';
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
            $this->price_brl = $data["price_brl"];
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
    private function findImage($product_id, $type, $order)
    {
        if (!empty($order)){
            $params = http_build_query(["product_id" => $product_id, "type" => $type, "order" => $order]);
            $productImage =  (new ProductImage())->find("product_id = :product_id AND type = :type AND complementary_order = :order", $params)->fetch();
            if (!empty($productImage)){
                return $productImage;
            }

        }else{
            $params = http_build_query(["product_id" => $product_id, "type" => $type]);
            $productImage = (new ProductImage())->find("product_id = :product_id AND type = :type", $params)->fetch();
            if (!empty($productImage)){
                return $productImage;
            }

        }
        return null;
    }
    public function deleteImage($imageId, bool $deleteOnDatabase = false){
        $image = (new ProductImage())->findById($imageId);
        if (!$image) {
            $this->message = "Não existe um imagem com esse ID.";
            return false;
        }
        $imageUploader = new ImageUploader(self::$DIR);
        if(!$imageUploader->delete($image->image)){
            $this->message = $imageUploader->getMessage();
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
    public function verifySize($imageFile)
    {
        if ($imageFile['size'] > 5000000) { // 5MB
            $this->message = "Imagem muito grande";
            return false;
        }
        return true;
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

    public function SaveImage(array $imageFile, string $type, int $order = null)
    {
        //echo json_encode($imageFile);
        $imageUploader = new ImageUploader(self::$DIR);
        if(!$this->verifySize($imageFile)){
            return false;
        }
        $upload = $imageUploader->upload($imageFile);
        if ($upload){
            $productImages = new ProductImage();
            $productImages->product_id = $this->id;
            $productImages->image = $upload;
            $productImages->type = $type;
            $productImages->complementary_order = $order;

            if (!$productImages->addImages()) {
                $this->message = $productImages->getMessage();
                return false;
            }
            return true;
        }
        $this->message = $imageUploader->getMessage();
        return false;
    }
    public function UpdateImage(array $imageFile, string $type, int $product_id, int $order = null)
    {
        $imageUploader = new ImageUploader(self::$DIR);
        if(!$this->verifySize($imageFile)){
            return false;
        }

        if ($type === ProductImage::$SECONDARY && $order == null) {
            $this->message = "Se o type for $type você tem que passar um valor para order";
            return false;
        }

        $imageFound = $this->findImage($product_id, $type, $order);
        if (empty($imageFound)) {
            $this->saveImage($imageFile, $type, $order);
            return true;
        }
        //echo json_encode($imageFound->image);
        $this->deleteImage($imageFound->id);
        $upload = $imageUploader->upload($imageFile);
        if(!$upload){
            $this->message = $imageUploader->getMessage();
            return false;
        }
        $imageFound->image = $upload;
        if (!$imageFound->addImages()) {
            $this->message = $imageFound->getMessage();
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
    public function getMessage()
    {
        return $this->message;
    }
}