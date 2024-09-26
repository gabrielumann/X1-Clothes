<?php

namespace Source\Models\User;

use CoffeeCode\DataLayer\DataLayer;

class Address extends DataLayer
{
    private $message;
    public function __construct()
    {
        //string $entity, array $required, string $primary = 'id', bool $timestamps = true, array $database = null
        parent::__construct("addresses", ["address","cep" ,"state", "user_id"], timestamps:  false);
    }

    public function getMessage()
    {
        return $this->message;
    }
}