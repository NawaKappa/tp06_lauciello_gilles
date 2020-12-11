<?php
// show_product.php <id>
require_once "bootstrap.php";

$prd = new Product();
$prd->__set("price","15.50");
$prd->__set("productName","Peluche");
$prd->__set("description","Un joli petit nounours");
$prd->__set("img","https://cdn.jsdelivr.net/gh/NawaKappa/tp03_lauciello_gilles@master/src/assets/images/pelucheSimple.jpg");


$entityManager->persist($prd);
$entityManager->flush();

echo "Created prd with ID " . $prd->__get("id") . "\n";


$prd = new Product();
$prd->__set("price","26");
$prd->__set("productName","Licorne");
$prd->__set("description","Une superbe licorne rose");
$prd->__set("img","https://cdn.jsdelivr.net/gh/NawaKappa/tp03_lauciello_gilles@master/src/assets/images/licorne.jpg");


$entityManager->persist($prd);
$entityManager->flush();

echo "Created prd with ID " . $prd->__get("id") . "\n";


$prd = new Product();
$prd->__set("price","8.99");
$prd->__set("productName","Lunettes de soleil");
$prd->__set("description","Une paire de lunettes de soleil rose");
$prd->__set("img","https://cdn.jsdelivr.net/gh/NawaKappa/tp03_lauciello_gilles@master/src/assets/images/lunettessoleilrose.jpg");


$entityManager->persist($prd);
$entityManager->flush();

echo "Created prd with ID " . $prd->__get("id") . "\n";

$prd = new Product();
$prd->__set("price","19.99");
$prd->__set("productName","Lot de briquets");
$prd->__set("description","Un lot de 5 briquets");
$prd->__set("img","https://cdn.jsdelivr.net/gh/NawaKappa/tp03_lauciello_gilles@master/src/assets/images/lotbriquets.jpg");


$entityManager->persist($prd);
$entityManager->flush();

echo "Created prd with ID " . $prd->__get("id") . "\n";


$prd = new Product();
$prd->__set("price","20.99");
$prd->__set("productName","Peluche");
$prd->__set("description","Un joli nounours très grand");
$prd->__set("img","https://cdn.jsdelivr.net/gh/NawaKappa/tp03_lauciello_gilles@master/src/assets/images/grandepeluche.jpg");


$entityManager->persist($prd);
$entityManager->flush();

echo "Created prd with ID " . $prd->__get("id") . "\n";