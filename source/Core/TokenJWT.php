<?php

namespace Source\Core;

use DateTimeImmutable;
use Firebase\JWT\JWT;
use Exception;
use Source\App\Api\Api;

class TokenJWT
{
    public $token;
    private $secretKey = 'sequencia_secreta_que_ninguem_sabe';

    public function create (array $dataInfo, bool $admin = false) : string
    {
        $tokenId    = base64_encode(random_bytes(16));
        $issuedAt   = new DateTimeImmutable();
        $expire     = ($admin) ? $issuedAt->modify('+9000 minutes')->getTimestamp() : $issuedAt->modify('+90 minutes')->getTimestamp();
        $serverName = url();

        $data = [
            'iat'  => $issuedAt->getTimestamp(),
            'jti'  => $tokenId,
            'iss'  => $serverName,
            'nbf'  => $issuedAt->getTimestamp(),
            'exp'  => $expire,
            'data' => $dataInfo
        ];

        return JWT::encode(
            $data,
            $this->secretKey,
            'HS512'
        );
    }

    public function verify (string $token) : bool
    {
        try {
            $this->token = JWT::decode((string)$token, $this->secretKey, ['HS512']);
            $now = new DateTimeImmutable();
            $serverName = url();
            if ($this->token->iss !== $serverName || $this->token->nbf > $now->getTimestamp() || $this->token->exp < $now->getTimestamp()) {
                return false;
            }
            return true;
        } catch (Exception $exception) {
            return false;
        }
    }
    public function verifyAdminPermission (string $token) : bool
    {
        if (!$this->verify($token)){
            return false;
        }
        $this->token = JWT::decode((string)$token, $this->secretKey, ['HS512']);
        if($this->token->data->role !== "ADMIN"){
            return false;
        }

        return true;

    }

}
