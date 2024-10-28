<?php

namespace Source\App\Api;

use Source\Core\TokenJWT;

abstract class Api
{
    protected $headers;
    protected $userAuth = false;
    protected $admin= false;
    public static int  $KEY_NOT_FOUND = 404;
    public static int  $KEY_NOT_EXIST = 501;

    public function __construct()
    {
        header('Content-Type: application/json; charset=UTF-8');
        $this->headers = getallheaders();
        if(!empty($this->headers["token"]) || isset($this->headers["token"])){
            $jwt = new TokenJWT();

            if($jwt->verify($this->headers["token"])){
                $this->userAuth = $jwt->token->data;
            }
            if($jwt->verifyAdminPermission($this->headers["token"])){
                $this->admin = $jwt->token->data;
            }
        }

    }

    private static function back (array $data, int $code = 200) : void
    {
        http_response_code($code);
        echo json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    }

    public function success (array $data = null, string $message = null, int $code = 200) : void
    {
        $return = ["type" => "success"];
        if(isset($message)){
            $return["message"] = $message;
        }
        if(isset($data)){
            $return["data"] = $data;
        }

        self::back($return, $code);
    }
    public function error (string $message = null, string $type = "error", int $code = 500) : void
    {
        $return = ["type" => "error"];
        if(isset($message)){
            $return["message"] = $message;
        }
        if(isset($message)){
            $return["type"] = $type;
        }

        self::back($return, $code);
    }
    protected function auth (): void
    {
        if (!$this->userAuth){
            $this->error("Usuário não autorizado e/ou token expirado", "unauthorized", 401);
            exit();
        }
    }
    public function authAdmin(): void
    {
        if (!$this->admin){
            $this->error("Voce não tem essa permissão!", "unauthorized", 401);
            exit();
        }
    }

    protected function message(string $class, string $code)
    {
        $help = "a";
        $class = strtolower($class);

        if (substr($class, -1) === 'o'){
            $help = "o";
        }


        switch ($code) {
            case self::$KEY_NOT_EXIST:
                 $this->success(message: "Não existe {$class} cadastrad$help.", code: self::$KEY_NOT_EXIST);
                break;
            case self::$KEY_NOT_FOUND:
                 $this->error(message: "$class inexistente.", code: self::$KEY_NOT_FOUND);
                break;
        }
    }
    protected function changeDirectory(callable $callable)
    {
        chdir("..");
        call_user_func($callable);
        chdir("api");
    }
}