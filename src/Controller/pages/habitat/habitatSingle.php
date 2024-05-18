<?php

require_once(dirname(__DIR__, 4) . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php');
$pathView = dirname(__DIR__, 3) . DIRECTORY_SEPARATOR . 'View' . DIRECTORY_SEPARATOR;

use App\Model\DbZoo;

if (session_status() != PHP_SESSION_ACTIVE) {
    session_start();
}
$Thabitat = new \App\Model\repository\TableHabitat(DbZoo::connection());
$Tanimal = new \App\Model\repository\TableAnimal(DbZoo::connection());

$Habitat = $Thabitat->getHabitatById((int) $params['id']);
if(!$Habitat)
{
    $router->getErrorPage();
    exit();
}
$lstAnimal = $Tanimal->getAllAnimalByHabitatId($Habitat->getId());

ob_start();
require $pathView . 'Pages' . DIRECTORY_SEPARATOR . 'SingleHabitat.php';
$contenu = ob_get_clean();
$titre = " Habitats {$Habitat->getNom()}";
$utilisateur = $_SESSION['utilisateur'] ?? false;
$habitatActive = "active";
require $pathView . 'index.php';