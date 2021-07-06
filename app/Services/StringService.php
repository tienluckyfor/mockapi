<?php

namespace App\Services;

use Firebase\JWT\JWT;
use Firebase\JWT\SignatureInvalidException;

class StringService
{
    public function duplicate($name){
        $name = preg_replace("#_duplicate_\d+$#mis", '', $name);
        $name = "{$name}_duplicate_".time();
        return $name;
    }

    public function JWT_encode($payload){
        $key = "example_key";
        $jwt = JWT::encode($payload, $key);
        return $jwt;
    }

    public function JWT_decode($jwt){
        try{
            $key = "example_key";
            $decoded = JWT::decode($jwt, $key, array('HS256'));
            return (array) $decoded;
        }
        catch (SignatureInvalidException $e) {
            return [];
        }
    }
}