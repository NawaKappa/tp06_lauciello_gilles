<?php
use \Firebase\JWT\JWT;

global $secret;
$secret = "superSECRET";


$jwt = new Tuupola\Middleware\JwtAuthentication([
    "secret" => $secret,
    "path" => "/api",
    "secure" => false,
    "ignore" => ["/api/client/login", "/api/client/signin"],
    "attribute" => "decoded_token_data",
    "algorithm" => ["HS256"],
    "error" => function ($response, $arguments) {
        $data["status"] = "error";
        $data["message"] = $arguments["message"];
        return $response
            ->withHeader("Content-Type", "application/json")
            ->getBody()->write(json_encode($data, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT));
    }
]);
