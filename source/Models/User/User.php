<?php

namespace Source\Models\User;

use CoffeeCode\DataLayer\DataLayer;
use PDOException;

class User extends DataLayer {
    private $message;
    public function __construct()
    {
        //string $entity, array $required, string $primary = 'id', bool $timestamps = true, array $database = null
        parent::__construct("users", ["first_name","last_name" ,"email", "password", "cpf", "role"], timestamps:  false);
    }

    public function createUser(): bool
    {
        if(!filter_var($this->email, FILTER_VALIDATE_EMAIL)){
            $this->message = "E-mail inválido!";
            return false;
        };

        $params = http_build_query(["email" => $this->email]);
        $user = $this->find("email = :email", $params);
        $user->fetch(true);

        if($user->count() == 1) {
            $this->message = "E-mail já cadastrado!";
            return false;
        };

        $this->message = "Usuário cadastrado com sucesso!";
        $this->id = $user->id;
        $this->first_name = $user->first_name;
        $this->last_name = $user->last_name;
        $this->email = $user->email;

        return parent::save();
    }
    public function login(string $email, string $password) : bool
    {

        $params = http_build_query(["email" => $email]);
        $user = (new User)->find("email = :email", $params)->fetch();

        if (!$user){
            $this->message = "E-mail não cadastrado!";
            return false;
        }

        if (!password_verify($password, $user->password)) {
            $this->message = "Senha incorreta!";
            return false;
        }

        $this->message = "Usuário logado com sucesso!";

        $this->id = $user->id;
        $this->first_name = $user->first_name;
        $this->last_name = $user->last_name;
        $this->email = $user->email;
        $this->role = $user->role;

        return true;
    }

    public function updatePassword(string $password, string $newPassword, string $confirmedNewPassword) : bool
    {
        $params = http_build_query(["id" => $this->id]);
        $user = $this->find("id = :id", $params)->fetch();

        if (!password_verify($password, $user->password)){
            $this->message = "Senha incorreta!";
            return false;
        }
        if ($newPassword != $confirmedNewPassword) {
            $this->message = "As senhas não são iguais!";
            return false;
        }

        $newPassword = password_hash($newPassword, PASSWORD_DEFAULT);
        $this->password = $newPassword;

        try {
            if(!parent::save()) {
                $this->message = $this->fail;
                return false;
            }
            $this->message = "Senha atualizada com sucesso!";
            return true;

        } catch (PDOException $exception) {
            $this->message = "Erro ao atualizar: {$exception->getMessage()}";
            return false;
        }
    }

    public function getMessage()
    {
        return $this->message;
    }
}