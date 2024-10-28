<?php

namespace Source\Support;

use CoffeeCode\Uploader\Image;

class ImageUploader
{
    private $message;
    private $uploadDir;
    private $image;

    public function __construct($dir, $uploadDir = "storage")
    {
        $this->uploadDir = $uploadDir;
        $this->image = new Image($this->uploadDir, "images/{$dir}");

    }

    public function upload($file)
    {
        $name = $file["name"];

        if (!empty($file["type"])) {
            if (in_array($file["type"], $this->image::isAllowed())) {
                return $this->image->upload($file, uniqid() . "-" . pathinfo($name, PATHINFO_FILENAME));
            }
            $this->message = "Imagem com tipo não permitido!";
            return null;
        }
        $this->message = "imagem não enviada";
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