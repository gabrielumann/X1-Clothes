<?php

namespace Source\App\Api;

use CoffeeCode\DataLayer\Connect;
use Source\Core\TokenJWT;
use Source\Models\User\User;
use Source\Support\ImageUploader;

class Users extends Api
{
    private static string $DIR = "user";
    public static string $KEY_NOT_FOUND_USER = "KEY_NOT_FOUND_USER";
    public static string $KEY_NOT_EXIST_USER = "KEY_NOT_EXIST_USER";
    public function __construct()
    {
        parent::__construct();

    }

    public function listUsers()
    {
        //$this->authAdmin();

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
                "image" => $user->image,
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

        $response[] = $user->data();
        $this->success($response);
    }

    public function createUser (array $data)
    {
        $user = new User();

        $requiredFields = ["first_name", "last_name", "email", "password", "passwordConfirmed", "cpf"];
        foreach ($requiredFields as $field) {
            if (!isset($data[$field])) {
                $this->error(message: "Está faltando o campo $field");
                die();
            }
        }
        if ($data["password"] !== $data["passwordConfirmed"]) {
            $this->error(message: "As senhas devem coincidir!");
            return;
        }

        $user->first_name = ucfirst($data["first_name"]);
        $user->last_name = ucfirst($data["last_name"]);
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
        //$this->authAdmin();

        $id = $data["id"];
        $user = (new User())->findById($id);
        if (!$user) {
            $this->messageUser(self::$KEY_NOT_FOUND_USER);
            return;
        }
        $user->setData($data);

        if($user->save()){
            $this->success(message: "Usuário atualizado com sucesso!");
        }
    }

    public function updateImage(array $data)
    {
        chdir("..");
        $user = (new User())->findById($data['id']);
        $imageUploader = new ImageUploader(self::$DIR);

        if ($user->hasImage()) {
            if (!$imageUploader->delete($user->image)){
                $this->error(message: $imageUploader->getMessage());
                return;
            }
        }
        $userImg = (!empty($_FILES["image"]["name"]) ? $_FILES["image"] : null);
        if (!$userImg) {
            $this->error(message: "Por favor, envie uma foto");
            return;
        }

        $upload = $imageUploader->upload($userImg);
        if(!$upload){
            $this->error(message: $imageUploader->getMessage());
            return;
        }

        chdir("api");
        $user->image = $upload;
        if($user->save()){
            $this->success( ["id" => $user->id, "image" => $user->image],"Imagem do usuário atualizada com sucesso!");
            return;
        }
        $this->error(message: "Erro ao atualizar no banco de dados!");


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
            "first_name" => $user->first_name,
            "role" => $user->role,
            "token" => $signature
        ], message: $user->getMessage());

    }

    public function changePassword(array $data)
    {
        //$this->auth();

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