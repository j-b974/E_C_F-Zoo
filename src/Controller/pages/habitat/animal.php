<?php
require_once(dirname(__DIR__, 4) . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php');
$pathView = dirname(__DIR__, 3) . DIRECTORY_SEPARATOR . 'View' . DIRECTORY_SEPARATOR;

use App\Model\DbZoo;

if (session_status() != PHP_SESSION_ACTIVE) {
session_start();
}
$Tanimal = new \App\Model\repository\TableAnimal(DbZoo::connection());
$animal = $Tanimal->getAnimalById((int) $params['id']);

ob_start();
require $pathView . 'Pages' . DIRECTORY_SEPARATOR . 'animal.php';
$contenu = ob_get_clean();
$titre = "animal {$animal->getPrenom()}";
$utilisateur = $_SESSION['utilisateur'] ?? false;
$habitatActive = "active";
require $pathView . 'index.php';