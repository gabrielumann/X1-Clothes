<?php

namespace Source\App\Api;

use Source\Models\Product\Size;

class Sizes extends Api
{
    private static string $CLASSNAME = "Tamanho";
    public function __construct()
    {
        parent::__construct();
    }
    public function listSizes()
    {
        $sizes = (new Size())->find()->fetch(true);

        $response = [];
        foreach ($sizes as $size) {

            $response[] = $size->data();
        }

        $this->success($response);
    }
    public function getSize(array $data){
        $id = $data["id"];
        $sizes = (new Size())->findById($id);
        if (!$sizes) {
            parent::message( self::$CLASSNAME, parent::$KEY_NOT_EXIST);
            return;
        }
        $response[] = $sizes->data();
        $this->success($response);
    }
    public function createSize(array $data){
        //$this->auth();

        $sizes = new Size();

        if (!isset($data["name"])) {
            $this->error(message: "Está faltando o campo 'name'");
            return;
        }


        $sizes->name = $data["name"];

        if (!$sizes->createSize()) {
            $this->error(message: $sizes->getMessage());
            return;
        }
        $response[] = [
            "id" => $sizes->id,
            "name" => $sizes->name,
        ];

        $this->success($response ,message: "Tamanho criado com sucesso!");
    }
    public function updateSize(array $data){
        $id = $data["id"];

        $instance = new Size();
        $size = $instance->findById($id);
        if (!$size) {
            parent::message( self::$CLASSNAME, parent::$KEY_NOT_EXIST);
            return;
        }

        if (!isset($data["name"])) {
            $this->error(message: "Está faltando o campo 'name'");
            die();
        }
        $size->name = $data["name"];
        if($size->save()){
            $response[] = $size->data();
            $this->success($response, message: "Tamanho atualizado com sucesso!");
        };
    }
    public function deleteSize(array $data){
        $id = $data["id"];
        $size = (new Size())->findById($id);

        if ($size) {
            $size->destroy();
            $this->success(message: "Tamanho do id: $id foi removido com sucesso!");
        } else {
            parent::message( self::$CLASSNAME, parent::$KEY_NOT_FOUND);
        }
    }
}