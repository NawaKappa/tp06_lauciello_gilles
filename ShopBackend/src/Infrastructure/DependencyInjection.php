<?php
use Psr\Container\ContainerInterface;
use DI\Container;

require 'src/Repository/IClientsRepo.php';
require 'src/Repository/IProductRepo.php';
require 'src/Repository/ClientsRepoPostgre.php';
require 'src/Repository/ProductRepoPostgre.php';
require 'src/ApplicationServices/ClientService.php';
require 'src/ApplicationServices/ProductService.php';


$container = new Container();

$container->set(IClientsRepo::class, function (ContainerInterface $container) {
    return new ClientsRepoPostgre();
});

$container->set(IClientService::class, function (ContainerInterface $container) {
    $repo = $container->get(IClientsRepo::class);
    return new ClientService($repo);
});

$container->set(ClientAPIController::class, function (ContainerInterface $container) {
    $service = $container->get(IClientService::class);
    return new ClientAPIController($service);
});


$container->set(IProductRepo::class, function (ContainerInterface $container) {
    return new ProductRepoPostgre();
});

$container->set(IProductService::class, function (ContainerInterface $container) {
    $repo = $container->get(IProductRepo::class);
    return new ProductService($repo);
});

$container->set(ProductAPIController::class, function (ContainerInterface $container) {
    $service = $container->get(IProductService::class);
    return new ProductAPIController($service);
});