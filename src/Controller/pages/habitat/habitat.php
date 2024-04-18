<?php

require_once(dirname(__DIR__, 4) . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php');
$pathView = dirname(__DIR__, 3) . DIRECTORY_SEPARATOR . 'View' . DIRECTORY_SEPARATOR;

use App\Model\DbZoo;

if (session_status() != PHP_SESSION_ACTIVE) {
    session_start();
}

//$db = DbZoo::connection();
ob_start();
require $pathView . 'Pages' . DIRECTORY_SEPARATOR . 'habitat.php';
$contenu = ob_get_clean();
$titre = "les Habitats du Zoo de josé";
$utilisateur = $_SESSION['utilisateur'] ?? false;
$habitatActive = "active";
require $pathView . 'index.php';