<?php

namespace Source\Support;

use CoffeeCode\Uploader\Image;

class ImageUploader
{
    private $message;
    private $uploadDir;
    private $image;

    public function __construct($uploadDir = "storage")
    {
        chdir("..");
        $this->uploadDir = $uploadDir;
        $this->image = new Image($this->uploadDir, "images");
    }

    public function upload($file)
    {
        $name = $file["name"];

        if (!empty($file["type"]) || !in_array($file["type"], $this->image::isAllowed())) {
            return $this->image->upload($file, uniqid() ."-". pathinfo($name, PATHINFO_FILENAME));
        }
        return null;
    }
    public function delete($imagePath)
    {
        if (unlink($imagePath)) {
            return true;
        } else {
            $this->message =  "Erro ao excluir o arquivo de caminho $imagePath.";
            return false;
        }
    }
    public function getMessage()
    {
        return $this->message;
    }

}