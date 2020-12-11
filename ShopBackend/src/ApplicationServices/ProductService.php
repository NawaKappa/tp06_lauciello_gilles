<?php
include('IProductService.php');
require_once(dirname(__DIR__).'/Repository/IProductRepo.php');


class ProductService implements IProductService
{
    private IProductRepo $repo;

    public function __construct(IProductRepo $repoPrd)
    {
        $this->repo = $repoPrd;
    }

    public function getProducts()
    {
        return $this->repo->getAllProduct();
    }
}