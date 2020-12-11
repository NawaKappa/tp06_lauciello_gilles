<?php
// bootstrap.php
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

require_once "vendor/autoload.php";

// Create a simple "default" Doctrine ORM configuration for Annotations
$isDevMode = true;
$config = Setup::createYAMLMetadataConfiguration(array(__DIR__."/yaml"), $isDevMode);

// database configuration parameters
$conn = array(
    'driver' => 'pdo_pgsql',
    'host' => 'ec2-46-137-156-205.eu-west-1.compute.amazonaws.com',
    'dbname' => 'd44besbj9qi3di',
    'user' => 'iqgkgbfwerdunw',
    'password' => '93e925fddf8523f149257fdd6e382c2a9461ab9e8f8857cbf2f793ed20d29da0',
    'port' => '5432',
    'sslmode' => 'require',  
);

// obtaining the entity manager
$entityManager = EntityManager::create($conn, $config);
