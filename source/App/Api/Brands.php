<?php

namespace Source\App\Api;

use Source\Models\Product\Brand;

class Brands extends Api
{
    private static string $CLASSNAME = "Marca";
    public function __construct()
    {
        parent::__construct();
    }
    public function listBrands()
    {
        $brands = (new Brand())->find()->fetch(true);

        $response = [];
        foreach ($brands as $brand) {

            $response[] = $brand->data();
        }

        $this->success($response);
    }
    public function getBrand(array $data){
        $id = $data["id"];
        $brands = (new Brand())->findById($id);
        if (!$brands) {
            parent::message( self::$CLASSNAME, parent::$KEY_NOT_EXIST);
            return;
        }
        $response[] = $brands->data();
        $this->success($response);
    }
    public function createBrand(array $data){
        //$this->auth();

        $brands = new Brand();

        if (!isset($data["name"])) {
            $this->error(message: "Está faltando o campo 'name'");
            return;
        }
        $brands->name = $data["name"];
        if (!$brands->createBrand()) {
            $this->error(message: $brands->getMessage());
            return;
        }
        $response[] = [
            "id" => $brands->id,
            "name" => $brands->name,
        ];

        $this->success($response ,message: "Marca adicionada com sucesso!");
    }
    public function updateBrand(array $data){
        $id = $data["id"];

        $instance = new Brand();
        $brand = $instance->findById($id);
        if (!$brand) {
            parent::message( self::$CLASSNAME, parent::$KEY_NOT_EXIST);
            return;
        }

        if (!isset($data["name"])) {
            $this->error(message: "Está faltando o campo 'name'");
            die();
        }
        $brand->name = $data["name"];
        if($brand->save()){
            $response[] = $brand->data();
            $this->success($response, message: "Marca atualizado com sucesso!");
        };
    }
    public function deleteBrand(array $data){
        $id = $data["id"];
        $brand = (new Brand())->findById($id);

        if ($brand) {
            $brand->destroy();
            $this->success(message: "Marca do id: $id foi removido com sucesso!");
        } else {
            parent::message( self::$CLASSNAME, parent::$KEY_NOT_FOUND);
        }
    }
}