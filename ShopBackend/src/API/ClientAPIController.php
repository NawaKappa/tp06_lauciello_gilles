<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use \Firebase\JWT\JWT;

include('JwtConfig.php');

class ClientAPIController
{
    private IClientService $service;
    
    public function __construct(IClientService $clientService) 
    {
        $this->service = $clientService;
    }

    public function login(Request $request, Response $response, $args)
    {
        $parsedBody = json_encode($request->getParsedBody());
        $login=$request->getParsedBody()['login'];
        $password=$request->getParsedBody()['password'];

        if($this->service->loginPasswordMatch($login, $password))
        {
            $token = $this->GenerateJWTFromLogin($login);

            return $response
                ->withStatus(200)
                ->withHeader("Authorization", "Bearer $token");
        }

        return $response
            ->withStatus(404);       
    }

    public function signin(Request $request, Response $response, $args)
    {
        $parsedBody = $request->getParsedBody();
        $login=$request->getParsedBody()['login'];

        $client = new Client($parsedBody);

        if($this->service->loginExists($parsedBody['login']))
        {
            $response->getBody()->write(json_encode("Login already exists"));   
            return $response
            ->withStatus(400);
        }
        else
        {
            $this->service->postClient($client);
            $token = $this->GenerateJWTFromLogin($login);

            return $response
            ->withStatus(200)
            ->withHeader("Authorization", "Bearer $token");
        }
    }

    public function getUserByJWT(Request $request, Response $response, $args)
    {
        $token = $request->getAttribute('decoded_token_data');
        $login = $token['userid'];
        $client = $this->service->getClientInfoByLogin($login);
        $response->getBody()->write(json_encode($client));
        return $response->withHeader("Content-Type", "application/json");
    }

    public function CheckClientToken(Request $request, Response $response, $args)
    {
        return $response->withHeader("Content-Type", "application/json");
    }


    private function GenerateJWTFromLogin($login)
    {
        global $secret;
        $issuedAt = time();
        $expirationTime = $issuedAt + 50000;
        $payload = array(
            'userid' => $login,
            'iat' => $issuedAt,
            'exp' => $expirationTime
        );

        $token = JWT::encode($payload, $secret, "HS256");
        
        return $token;
    }

}