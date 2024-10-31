<?php
    class TokenService {
        private $secretKey = 'mySecretKey123456';
        private $expirationTime = 7200;

        public function generateToken($data) {
            $payload = [
                'data' => $data,
                'exp' => time() + $this->expirationTime
            ];
            return JWT::encodde($payload, $this->secretKey);
        }

        public function verifyToken($token){
            try {
                $decoded = JWT::decode($token, $this->secretKey, ['HS256']);
                return (array) $decoded;
            } catch (Exception $e) {
                return false;
            }
        }
    }
?>