<?php

namespace Source\App\Api;

use Source\Models\Product\Stock;

class Stocks extends Api
{
    private static string $CLASSNAME = "Estoque";
    public function __construct()
    {
        parent::__construct();
    }

    public function listStock()
    {
        $stocks = (new Stock())->find()->fetch(true);
        if (!$stocks) {
            parent::message( self::$CLASSNAME, parent::$KEY_NOT_EXIST);
            return;
        }

        $response = [];
        foreach ($stocks as $stock) {
            $response[] = [
                "id" => $stock->id,
                "product_name" => $stock->getProductName(),
                "product_id" => $stock->product_id,
                "quantity" => $stock->quantity,
            ];
        }

        $this->success($response);
    }
    public function getProductId(array $data){

        $params = http_build_query(["product_id" => $data["id"]]);
        $stock = (new Stock())->find("product_id = :product_id", $params)->find(true);
        //echo $params;
        if (!$stock) {
            $this->success(message: "Não existe esse produto no estoque.");
            return;
        }
        $response[] = $stock->data();
        $this->success($response);
    }
    public function AddProduct(array $data){
        //$this->auth();
        $stock = new Stock();
        if (!isset($data["quantity"])) {
            $stock->quantity = 0;
        }

        if (!isset($data["product_id"])) {
            $this->error(message: "Está faltando o campo 'product_id'");
            return;
        }

        // checar se o id é realmente de algum produto.
        // checar se o produto ja esta cadastrado
        $stock->product_id = $data["product_id"];

        if (!$stock->save()) {
            $this->error(message: "erro ao adicionar o produto no estoque");
            return;
        }

        $response[] = [
            "id" => $stock->id,
            "product_name" => $stock->getProductName(),
            "product_id" => $stock->product_id,
            "quantity" => $stock->quantity,
        ];

        $this->success($response ,message: "Produto adicionado com sucesso!");
    }
    public function updateQuantity(array $data){
        $id = $data["id"];
        $stock = (new Stock())->find("product_id = :pid" , "pid = $id")->fetch(true);
        if (!$stock) {
            parent::message( self::$CLASSNAME, parent::$KEY_NOT_EXIST);
            return;
        }

        if (!isset($data["quantity"])) {
            $this->error(message: "Está faltando o campo 'quantity'");
            die();
        }
        $stock->quantity = $data["quantity"];
        if($stock->save()){
            $response[] = [
                "id" => $stock->id,
                "product_name" => $stock->getProductName(),
                "product_id" => $stock->product_id,
                "quantity" => $stock->quantity,
            ];

            $this->success($response, message: "Produto atualizado no estoque com sucesso!");
        };
    }
    public function deleteProduct(array $data){
        $id = $data["id"];
        $stock = (new Stock())->find("product_id = :pid" , "pid = $id")->fetch(true);

        if ($stock) {
            $stock->destroy();
            $this->success(message: "Produto do id: $id foi removido com sucesso do Estoque!");
        } else {
            parent::message( self::$CLASSNAME, parent::$KEY_NOT_FOUND);
        }
    }
}