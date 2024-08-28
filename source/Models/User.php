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
        parent::__construct("users", ["first_name","last_name" ,"email", "password", "cpf", "role"], timestamps:  false);
    }

    public function save(): bool
    {
        if(!filter_var($this->email, FILTER_VALIDATE_EMAIL)){
            $this->message = "E-mail inválido!";
            return false;
        };

        $params = http_build_query(["email" => $this->email]);
        $email = $this->find("email = :email", $params);
        $email->fetch(true);

        if($email->count() == 1) {
            $this->message = "E-mail já cadastrado!";
            return false;
        };

        return parent::save();
    }

    public function getMessage()
    {
        return $this->message;
    }
}