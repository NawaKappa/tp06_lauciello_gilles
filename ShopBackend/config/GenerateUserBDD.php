<?php
require_once "bootstrap.php";


$user = new Client("");
$user->__set("nom","lauciello");
$user->__set("prenom","gilles");
$user->__set("sexe","homme");
$user->__set("adresse","6b grand rue");
$user->__set("ville","Barr");
$user->__set("codepostal","67140");
$user->__set("email","gilles.lauciello@live.fr");
$user->__set("login","test");
$user->__set("telephone","0643616706");
$user->__set("password","test");

$entityManager->persist($user);
$entityManager->flush();

echo "Created user with ID " . $user->__get("id") . "\n";