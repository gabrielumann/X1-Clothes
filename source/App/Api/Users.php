<?php

namespace Source\App\Api;

use CoffeeCode\DataLayer\Connect;
use Source\Core\TokenJWT;
use Source\Models\User\User;

class Users extends Api
{
    public static string $KEY_NOT_FOUND_USER = "KEY_NOT_FOUND_USER";
    public static string $KEY_NOT_EXIST_USER = "KEY_NOT_EXIST_USER";
    public function __construct()
    {
        parent::__construct();

    }

    public function listUsers()
    {
        //$this->auth();

        $users = (new User())->find()->fetch(true);

        if(!$users){
            $this->messageUser(self::$KEY_NOT_EXIST_USER);
            return;
        }

        $response = [];
        foreach ($users as $user){
            $response[] = [
                "id" => $user->id,
                "first_name" => $user->first_name,
                "last_name" => $user->last_name,
                "email" => $user->email,
                "cpf" => $user->cpf,
                "role" => $user->role,
            ];
        }
        $this->success($response);

    }

    public function getUser(array $data)
    {


        $id = $data["id"];
        $user = (new User())->findById($id);
        if (!$user) {
            $this->messageUser(self::$KEY_NOT_FOUND_USER);
            return;
        }

        $response[] = [
            "id" => $user->id,
            "first_name" => $user->first_name,
            "last_name" => $user->last_name,
            "email" => $user->email,
            "cpf" => $user->cpf,
            "role" => $user->role,
        ];
        $this->success($response);
    }

    public function createUser (array $data)
    {
        $user = new User();

        $requiredFields = ["first_name", "last_name", "email", "password", "cpf"];
        foreach ($requiredFields as $field) {
            if (!isset($data[$field])) {
                $this->error(message: "Está faltando o campo $field");
                die();
            }
        }

        $user->first_name = $data["first_name"];
        $user->last_name = $data["last_name"];
        $user->email = $data["email"];
        $password = password_hash($data["password"], PASSWORD_DEFAULT);
        $user->password = $password;
        $user->cpf = $data["cpf"];
        $user->role = "DEFAULT";

        if(!$user->createUser()){
            $this->error(message: $user->getMessage());
            return;
        }

        $response[] = [
            "id" => $user->id,
            "name" => $user->first_name . " ". $user->last_name,
            "email" => $user->email,
        ];

        $this->success($response, message: $user->getMessage());
    }

    public function updateUser(array $data)
    {
        //$this->auth();
        //$this->userAuth->id   ||
        $id = $data["id"];
        $user = (new User())->findById($id);
        if (!$user) {
            $this->messageUser(self::$KEY_NOT_FOUND_USER);
            return;
        }

        if (isset($data["first_name"])) {
            $user->first_name = $data["first_name"];
        }
        if (isset($data["last_name"])) {
            $user->last_name = $data["last_name"];;
        }
        if (isset($data["email"])) {
            $user->email = $data["email"];
        }

        if($user->save()){
            $this->success(message: "Usuário atualizado com sucesso!");
        };
    }

    public function deleteUser(array $data)
    {
        //$this->auth();

        if (isset($data["id"])) {
            $id = $data["id"];
        }else{
            $id = $this->userAuth->id ;
        }

        $user = (new User())->findById($id);

        if ($user) {
            $user->destroy();
            $this->success(message: "Usuário foi removido com sucesso!");
        } else {
            $this->messageUser(self::$KEY_NOT_FOUND_USER);
        }

    }
    public function loginUser (array $data) {
        $user = new User();

        if(!$user->login($data["email"], $data["password"])){
            $this->error(message: $user->getMessage());
            return;
        }
        $token = new TokenJWT();
        $signature = $token->create([
            "id" => $user->id,
            "name" => $user->first_name . " ". $user->last_name,
            "email" => $user->email,
            "role" => $user->role,
        ]);

        $this->success([
            "id" => $user->id,
            "name" => $user->first_name . " ". $user->last_name,
            "email" => $user->email,
            "token" => $signature
        ], message: $user->getMessage());

    }

    public function changePassword(array $data)
    {

        $id = $data["id"];
        $user = (new User())->findById($id);

        if(!$user->updatePassword($data["password"],$data["newPassword"],$data["confirmedNewPassword"])){
            $this->error(message: $user->getMessage());
            return;
        }

        $this->success(message:  $user->getMessage());
    }

    public function messageUser(string $KEY)
    {
        switch ($KEY) {
            case self::$KEY_NOT_EXIST_USER:
                $this->success(message: "Não existem usuários cadastrados.");
                break;
            case self::$KEY_NOT_FOUND_USER:
                $this->error(message: "Usuário não encontrado.", code: 404);
                break;
        }
    }
}