<?php
require_once dirname(__DIR__).'/../config/bootstrap.php';

class ProductRepoPostgre implements IProductRepo
{
    public function getRepo()
    {
        global $entityManager;
        return $entityManager->getRepository('Product');
    }
   
    public function getAllProduct()
    {
        $products = $this->getRepo()->findAll();
        return $products;
    }

}