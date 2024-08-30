<?php

namespace Source\App\Api;

use Source\Core\TokenJWT;

abstract class Api
{
    protected $headers;
    protected $userAuth = false;

    public function __construct()
    {
        header('Content-Type: application/json; charset=UTF-8');
        $this->headers = getallheaders();

        if(!empty($this->headers["token"]) || isset($this->headers["token"])){
            $jwt = new TokenJWT();
            if($jwt->verify($this->headers["token"])){
                $this->userAuth = $jwt->token->data;
            }
        }
    }

    private static function back (array $response, int $code = 200) : void
    {
        http_response_code($code);
        echo json_encode($response, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    }

    public function success (array $response = null, string $message = null, int $code = 200) : void
    {
        $return = ["type" => "success"];
        if(isset($message)){
            $return["message"] = $message;
        }
        if(isset($response)){
            $return["response"] = $response;
        }

        self::back($return, $code);
    }
    public function error (string $message = null, int $code = 500) : void
    {
        $return = ["type" => "error"];
        if(isset($message)){
            $return["message"] = $message;
        }

        self::back($return, $code);
    }
    protected function auth (): void
    {
        if (!$this->userAuth){
            $this->error("Usuário não autorizado e/ou token expirado", 401);
            exit();
        }
    }

}