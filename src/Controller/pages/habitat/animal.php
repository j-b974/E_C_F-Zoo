<?php
require_once(dirname(__DIR__, 4) . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php');
$pathView = dirname(__DIR__, 3) . DIRECTORY_SEPARATOR . 'View' . DIRECTORY_SEPARATOR;

use App\Model\DbZoo;

if (session_status() != PHP_SESSION_ACTIVE) {
session_start();
}




$Tanimal = new \App\Model\repository\TableAnimal(DbZoo::connection());
$animal = $Tanimal->getAnimalById((int) $params['id']);

// =========== ajoute annimal vue a mongodb ================
$bdzoo = \App\Model\MongodbZoo::connection();

$vueAnimal = $bdzoo->vue_animal;
$date  = new DateTime();
$vueAnimal->insertOne(
    ['animalId'=> $animal->getId() ,'name'=> $animal->getPrenom(),'date' => $date->format('Y-m-d H:i:s')]
);

// ======================================


ob_start();
require $pathView . 'Pages' . DIRECTORY_SEPARATOR . 'animal.php';
$contenu = ob_get_clean();
$titre = "animal {$animal->getPrenom()}";
$utilisateur = $_SESSION['utilisateur'] ?? false;
$habitatActive = "active";
require $pathView . 'index.php';