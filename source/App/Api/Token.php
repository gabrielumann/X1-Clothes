<?php

namespace Source\App\Api;

use Source\Core\TokenJWT;

class Token extends Api
{
    public function __construct()
    {
        parent::__construct();
    }
    public function tokenValidate()
    {
        $jwt = new TokenJWT();
        $token = getallheaders()["token"];
        if (strpos($token, 'Bearer ') === 0) {
            $token = substr($token, 7);
        }
//      echo json_encode($token);
        if(!$jwt->verify($token)){
            $this->error("Token Invalido e/ou expirado!");
            die();
        }
        $this->success(message: "Token valido!");

    }
    public function adminPermission()
    {
        $jwt = new TokenJWT();
        $token = getallheaders()["token"];
        if (strpos($token, 'Bearer ') === 0) {
            $token = substr($token, 7);
        }
//      echo json_encode($token);
        if(!$jwt->verifyAdminPermission($token)){
            $this->error("Você não poderia estar aqui!!");
            die();
        }
        $this->success(message: "ADM BRABO!");

    }
}