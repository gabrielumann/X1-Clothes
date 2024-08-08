<?php

namespace Source\App\Api;

use CoffeeCode\DataLayer\Connect;
use Source\Core\TokenJWT;
use Source\Models\User;

class Users extends Api
{
    public function __construct()
    {
        parent::__construct();
    }

    public function testConnection()
    {
        $error = Connect::getError();

        if ($error){
            echo $error->getMessage();
            die();
        }
        echo "good connection with database";
    }
    public function listUsers ()
    {
        $user = new User();
        $listUser = $user->find()->fetch(true);

        if (!$listUser){
            $this->back("Nenhum Usuário cadastrado");
        }

        $response = [];
        foreach ($listUser as $user){
            $response[] = [
                "id" => $user->id,
                "first_name" => $user->first_name,
                "last_name" => $user->last_name,
                "email" => $user->email,
                "password" => $user->password,
                "cpf" => $user->cpf,
                "role" => $user->role,
            ];
        }
        $this->back($response);


    }

    public function insertUser (array $data)
    {

        $user = new User(
            NULL,
            $data["name"],
            $data["email"],
            $data["password"],
        );

        $insert = $user->insert();

        if(!$insert){
            $this->back([
                "type" => "error",
                "message" => $user->getMessage()
            ]);
            return;
        }

        $this->back([
            "type" => "success",
            "message" => $user->getMessage(),
            "user" => [
                "id" => $insert,
                "name" => $user->getName(),
                "email" => $user->getEmail()
            ]
        ]);

    }

    public function loginUser (array $data) {
        $user = new User();

        if(!$user->login($data["email"],$data["password"])){
            $this->back([
                "type" => "error",
                "message" => $user->getMessage()
            ]);
            return;
        }
        $token = new TokenJWT();
        $this->back([
            "type" => "success",
            "message" => $user->getMessage(),
            "user" => [
                "id" => $user->getId(),
                "name" => $user->getName(),
                "email" => $user->getEmail(),
                "token" => $token->create([
                    "id" => $user->getId(),
                    "name" => $user->getName(),
                    "email" => $user->getEmail()
                ])
            ]
        ]);

    }

    public function updateUser(array $data)
    {
        if(!$this->userAuth){
            $this->back([
                "type" => "error",
                "message" => "Você não pode estar aqui.."
            ]);
            return;
        }

        $user = new User(
            $this->userAuth->id,
            $data["name"],
            $data["email"]
        );

        if(!$user->update()){
            $this->back([
                "type" => "error",
                "message" => $user->getMessage()
            ]);
            return;
        }

        $this->back([
            "type" => "success",
            "message" => $user->getMessage(),
            "user" => [
                "id" => $user->getId(),
                "name" => $user->getName(),
                "email" => $user->getEmail()
            ]
        ]);
    }

    public function setPassword(array $data)
    {
        if(!$this->userAuth){
            $this->back([
                "type" => "error",
                "message" => "Você não pode estar aqui.."
            ]);
            return;
        }

        $user = new User($this->userAuth->id);

        if(!$user->updatePassword($data["password"],$data["newPassword"],$data["confirmNewPassword"])){
            $this->back([
                "type" => "error",
                "message" => $user->getMessage()
            ]);
            return;
        }

        $this->back([
            "type" => "success",
            "message" => $user->getMessage()
        ]);
    }

}