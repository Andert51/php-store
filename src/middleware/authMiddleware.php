<?php
    require_once '../services/tokenService.php';

    class authMiddleware {
        public static function verificateToken() {
            $headers = apache_request_headers();
            if (!isset($headers['Authorization'])) {
                return ['msg' => 'Token not found', 'code'=> 401];
            }
            $token = str_replace('Bearer ', '', $headers['Authorization']);
            $tokenService = new TokenService();
            if (!$tokenService->verifyToken($token)) {
                return ['msg'=> 'Invalid  token', 'code'=> 403];
            }
            return ['msg'=> 'Valid  token', 'code'=> 200];
        }
    }
?>