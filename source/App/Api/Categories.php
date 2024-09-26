<?php

namespace Source\App\Api;

use Source\Models\Product\Category;

class Categories extends Api
{
    private static string $CLASSNAME = "categoria";
    public function __construct()
    {
        parent::__construct();
    }
    public function listCategories()
    {
        $category = new Category();
        $categories = $category->find()->fetch(true);

        $response = [];
        foreach ($categories as $category) {

            $response[] = $category->data();
        }

        $this->success($response);
    }
    public function getCategory(array $data){
        $id = $data["id"];
        $category = (new Category())->findById($id);
        if (!$category) {
            parent::message( self::$CLASSNAME, parent::$KEY_NOT_FOUND);
            return;
        }
        $response[] = $category->data();
        $this->success($response);
    }
    public function createCategory(array $data){
        //$this->auth();

        $category = new Category();

            if (!isset($data["name"])) {
                $this->error(message: "Está faltando o campo 'name'");
                die();
            }


        $category->name = $data["name"];

        if (!$category->createCategory()) {
            $this->error(message: $category->getMessage());
            return;
        }
        $response[] = [
            "id" => $category->id,
            "name" => $category->name,
        ];

        $this->success($response ,message: "Categoria criada com sucesso!");
    }
    public function updateCategory(array $data){
        $id = $data["id"];

        $instance = new Category();
        $category = $instance->findById($id);
        if (!$category) {
            parent::message( self::$CLASSNAME, parent::$KEY_NOT_FOUND);
            return;
        }

        if (isset($data["name"])) {
            $category->name = $data["name"];
        }
        if (isset($data["image"])) {
            $category->image = $data["image"];
        }

        if($category->save()){
            $response[] = $category->data();
            $this->success($response, message: "Categoria atualizada com sucesso!");
        };
    }
    public function deleteCategory(array $data){
        $id = $data["id"];
        $category = (new Category())->findById($id);

        if ($category) {
            $category->destroy();
            $this->success(message: "Categoria do id: $id foi removida com sucesso!");
        } else {
            parent::message( self::$CLASSNAME, parent::$KEY_NOT_FOUND);
        }
    }
}