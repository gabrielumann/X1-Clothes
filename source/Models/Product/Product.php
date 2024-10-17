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
            die();
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

    public function SaveImage(array $imageFile, string $type): void
    {
        if(!$this->verifySize($imageFile)){
            return;
        }
        $productId = $this->id;
        $newItemValue = null;
        $uniqueName = $this->generateName($imageFile, $type);

        if ($type === ProductImage::$SECONDARY) {
            $uniqueName = $this->generateName($imageFile, $type);
            $params = http_build_query(["product_id" => $productId, "type" => $type]);
            $imageFound = (new ProductImage())->find("product_id = :product_id AND type = :type ORDER BY complementary_order DESC", $params);
            echo json_encode($imageFound);
            if (!isset($imageFound)) {
                $newItemValue = 1;
            } else {
                $newItemValue = $imageFound->additional_order + 1;
            }
        }
        $upload = $this->storageUploadImage($imageFile, $uniqueName);
        if ($upload){
            $productImages = new ProductImage();
            $productImages->product_id = $productId;
            $productImages->image = $upload;
            $productImages->type = $type;
            $productImages->complementary_order = $newItemValue;

            if (!$productImages->addImages()) {
                $this->message = $productImages->getMessage() . 'SECONDARY ERROR';
            }
        }
    }

    public function UpdateImage($imageFile, $type, $order = null): void
    {
        if(!$this->verifySize($imageFile)){
            return;
        }

        $product_id = $this->id;

        if ($type === ProductImage::$SECONDARY && $order == null) {
            $this->message = "Se o type for $type você tem que passar um valor para order";
            return;
        }

        if ($type === ProductImage::$PRINCIPAL) {
            $params = http_build_query(["product_id" => $product_id, "type" => $type]);
            $search = (new ProductImage())->find("product_id = :product_id AND `type` = :type", $params)->fetch(true);
            echo json_encode($search);
            if (!isset($search->id)) {
                $this->saveImage($imageFile, $type);
                return;
            }
            $this->deleteImage($search->id, true);

            $upload = $this->storageUploadImage($imageFile, $search->image);

            $search->image = $upload;
            if (!$search->save()){
                $this->message = "Erro ao enviar a imagem: $upload ao banco de dados!";
            }
        }

        if ($type === ProductImage::$SECONDARY) {
            $params = http_build_query(["product_id" => $product_id, "type" => $type, "order" => $order]);
            $imageFinded = (new ProductImage())->find("product_id = :product_id AND type = :type AND complementary_order = :order", $params)->fetch();
            if ($imageFinded === null) {
                $this->saveImage($imageFile, $type);
                return;
            }
            $this->deleteImage($imageFinded->id, true);
            $upload = $this->storageUploadImage($imageFile, $product_id);
            $imageFinded->image = $upload;

            if (!$imageFinded->save()){
                $this->message = "Erro ao enviar a imagem: $upload ao banco de dados!";
            }
        }
    }
    public function deleteImage($imageId, bool $deleteOnDatabase = false): void
    {
        $image = (new ProductImage())->findById($imageId);
        if (!$image) {
            $this->message = "Não existe um imagem com esse ID.";
            return;
        }
        $pathCurrentImage = "storage/images/products/" . $image->image;
        if (file_exists($pathCurrentImage)) {
            if (unlink($pathCurrentImage)) {
                $this->message = "Arquivo excluído com sucesso.";
            } else {
                $this->message =  "Erro ao excluir o arquivo de caminho $pathCurrentImage.";
                return;
            }
        } else {
            $this->message = "Arquivo não encontrado.";
            return;
        }

        if ($deleteOnDatabase) {
            if (!$image->destroy()) {
                $this->message = "Erro ao apagar a imagem!";
                return;
            }
            $this->message = "Imagem: $image->image foi removida com sucesso!";
        }

    }

    public function getMessage()
    {
        return $this->message;
    }
}