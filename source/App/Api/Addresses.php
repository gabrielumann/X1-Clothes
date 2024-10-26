<?php

namespace Source\App\Api;

use Source\Models\User\Address;

class Addresses extends Api
{
    private static string $CLASSNAME = "Endereço";
    public function __construct()
    {
        parent::__construct();
    }

    public function listAddresses()
    {
        $addresses = (new Address())->find()->fetch(true);
        if (!$addresses) {
            parent::message( self::$CLASSNAME, parent::$KEY_NOT_EXIST);
            return;
        }
        foreach ($addresses as $address) {
            $response[] = $address->data();

        }
        $this->success($response);
    }
    public function getAddressByUser(array $data){
        $id = $data["id"];
        $params = http_build_query(["user_id" => $id]);
        $address = (new Address())->find("user_id = :user_id", $params)->fetch();
        if (!$address) {
            parent::message( self::$CLASSNAME, parent::$KEY_NOT_EXIST);
            return;
        }
        $response[] = $address->data();
        $this->success($response);
    }
    public function createAddress(array $data){
        //$this->auth();

        $address = new Address();

        $requiredFields = ["address", "cep", "state", "user_id"];
        foreach ($requiredFields as $field) {
            if (!isset($data[$field])) {
                $this->error(message: "Está faltando o campo '$field'");
                die();
            }
        }

        $address->address = $data["address"];
        $address->cep = $data["cep"];
        $address->state = $data["state"];
        $address->user_id = $data["user_id"];

        if (!$address->save()) {
            $this->error(message: $address->getMessage());
            return;
        }
        $response[] = $address->data();
        $this->success($response ,message: $address->getMessage());
    }
    public function updateAddress(array $data)
    {
        $id = $data["id"];

        $instance = new Address();
        $address = $instance->findById($id);
        if (!$address) {
            parent::message( self::$CLASSNAME, parent::$KEY_NOT_EXIST);
            return;
        }

        if (isset($data["address"])) {
            $address->address = $data["address"];
        }
        if (isset($data["cep"])) {
            $address->cep = $data["cep"];
        }
        if (isset($data["state"])) {
            $address->state = $data["state"];
        }
        if (isset($data["user_id"])) {
            $address->user_id = $data["user_id"];
        }
        if($address->save()){
            $response[] = $address->data();
            $this->success($response, message: "Endereço atualizado com sucesso!");
        }
    }
    public function deleteAddress(array $data){
        $id = $data["id"];
        $address = (new Address())->findById($id);

        if ($address) {
            $address->destroy();
            $this->success(message: "Endereço do id: $id foi removido com sucesso!");
        } else {
            parent::message( self::$CLASSNAME, parent::$KEY_NOT_FOUND);
        }
    }
}
