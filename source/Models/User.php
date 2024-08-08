<?php

namespace Source\Models;

use CoffeeCode\DataLayer\DataLayer;
use PDOException;
use Source\Core\Connect;

class User extends DataLayer {
    private $message;
    public function __construct()
    {
        //string $entity, array $required, string $primary = 'id', bool $timestamps = true, array $database = null
        parent::__construct("users", ["first_name","last_name" ,"email", "password", "cpf", "role"], "", false);
    }

    public function save(): bool
    {
        if(!filter_var($this->email, FILTER_VALIDATE_EMAIL)){
            $this->message = "E-mail inválido!";
            return false;
        }
        $params = http_build_query(["email" => $this->email]);
        $email = $this->find("email = :email", $params);
        $email->fetch(true);
        if($email->count() == 1) {
            $this->message = "E-mail já cadastrado!";
            return false;
        }

        return parent::save();
    }

//
//    public function insert(): ?int
//    {
//
//
//
//        $query = "INSERT INTO users (name, email, password)
//                  VALUES (:name, :email, :password)";
//
//        $stmt = $conn->prepare($query);
//        $stmt->bindParam(":name", $this->name);
//        $stmt->bindParam(":email", $this->email);
//        $stmt->bindParam(":password", $this->password);
//
//        try {
//            $stmt->execute();
//            $this->message = "Usuário cadastrado com sucesso!";
//            return $conn->lastInsertId();
//        } catch (PDOException) {
//            $this->message = "Por favor, informe todos os campos!";
//            return false;
//        }
//    }
//
//    public function login(string $email, string $password): bool
//    {
//        $query = "SELECT * FROM users WHERE email = :email";
//        $conn = Connect::getInstance();
//        $stmt = $conn->prepare($query);
//        $stmt->bindParam(":email", $email);
//        $stmt->execute();
//        $result = $stmt->fetch();
//
//        if (!$result) {
//            $this->message = "E-mail não cadastrado!";
//            return false;
//        }
//
//        if (!password_verify($password, $result->password)) {
//            $this->message = "Senha incorreta!";
//            return false;
//        }
//
//        $this->setId($result->id);
//        $this->setName($result->name);
//        $this->setEmail($result->email);
//
//        $this->message = "Usuário logado com sucesso!";
//
//        return true;
//
//    }
//
//    public function update () : bool
//    {
//        $conn = Connect::getInstance();
//
//        if(!filter_var($this->email, FILTER_VALIDATE_EMAIL)){
//            $this->message = "E-mail inválido!";
//            return false;
//        }
//
//        $query = "SELECT * FROM users WHERE email LIKE :email AND id != :id";
//        $stmt = $conn->prepare($query);
//        $stmt->bindParam(":email", $this->email);
//        $stmt->bindParam(":id", $this->id);
//        $stmt->execute();
//
//        if($stmt->rowCount() == 1) {
//            $this->message = "E-mail já cadastrado!";
//            return false;
//        }
//
//        $query = "UPDATE users
//                  SET name = :name, email = :email
//                  WHERE id = :id";
//
//        $stmt = $conn->prepare($query);
//        $stmt->bindParam(":name", $this->name);
//        $stmt->bindParam(":email", $this->email);
//        $stmt->bindParam(":id", $this->id);
//
//        try {
//            $stmt->execute();
//            $this->message = "Usuário atualizado com sucesso!";
//            return true;
//        } catch (PDOException $exception) {
//            $this->message = "Erro ao atualizar: {$exception->getMessage()}";
//            return false;
//        }
//
//    }
//
//    public function updatePassword (string $password, string $newPassword, string $confirmNewPassword) : bool
//    {
//        $query = "SELECT * FROM users WHERE id = :id";
//        $conn = Connect::getInstance();
//        $stmt = $conn->prepare($query);
//        $stmt->bindParam(":id", $this->id);
//        $stmt->execute();
//        $result = $stmt->fetch();
//
//        if (!password_verify($password, $result->password)) {
//            $this->message = "Senha incorreta!";
//            return false;
//        }
//
//        if ($newPassword != $confirmNewPassword) {
//            $this->message = "As senhas não conferem!";
//            return false;
//        }
//
//        $newPassword = password_hash($newPassword, PASSWORD_DEFAULT);
//
//        $query = "UPDATE users
//                  SET password = :password
//                  WHERE id = :id";
//
//        $stmt = $conn->prepare($query);
//        $stmt->bindParam(":password", $newPassword);
//        $stmt->bindParam(":id", $this->id);
//
//        try {
//            $stmt->execute();
//            $this->message = "Senha atualizada com sucesso!";
//            return true;
//        } catch (PDOException $exception) {
//            $this->message = "Erro ao atualizar: {$exception->getMessage()}";
//            return false;
//        }
//
//    }
    public function getMessage()
    {
        return $this->message;
    }
}