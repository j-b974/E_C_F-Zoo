<?php
require_once (dirname(__DIR__,3).DIRECTORY_SEPARATOR.'vendor'.DIRECTORY_SEPARATOR.'autoload.php');
$pathView = dirname(__DIR__, 2) . DIRECTORY_SEPARATOR . 'View' .DIRECTORY_SEPARATOR;
use App\Model\DbZoo;
if (session_status() != PHP_SESSION_ACTIVE) {
    session_start();
}

//$db = DbZoo::connection();
ob_start();
require $pathView.'Pages'.DIRECTORY_SEPARATOR.'contact.php';
$contenu = ob_get_clean();
$titre = "Contactez nous";
$utilisateur = $_SESSION['utilisateur'] ?? false;
$contactActive ="active";
require $pathView.'index.php';