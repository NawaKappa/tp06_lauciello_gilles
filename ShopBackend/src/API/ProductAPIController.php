<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use \Firebase\JWT\JWT;

include('JwtConfig.php');

class ProductAPIController
{
    private IProductService $service;
    
    public function __construct(IProductService $clientService) 
    {
        $this->service = $clientService;
    }

    public function getAllProducts(Request $request, Response $response, $args)
    {
        $products = $this->service->getProducts();
        $response->getBody()->write(json_encode($products));
        return $response->withHeader("Content-Type", "application/json")
            ->withStatus(200);
    }

}