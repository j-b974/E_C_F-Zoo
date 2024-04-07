<?php
require_once (dirname(__DIR__,5).DIRECTORY_SEPARATOR.'vendor'.DIRECTORY_SEPARATOR.'autoload.php');
$pathView = dirname(__DIR__, 4).DIRECTORY_SEPARATOR.'View'.DIRECTORY_SEPARATOR;
use App\Model\DbZoo;

//$db = DbZoo::connection();
\App\Controller\services\Verificateur::checkRole($router ,['administrateur']);
$Tutilisateur = new \App\Model\repository\TableUtilisateur(DbZoo::connection());
$dataUtilisateur = $Tutilisateur->getAllUtilisateur();

ob_start();

require $pathView.'Pages'.DIRECTORY_SEPARATOR.'administration'.DIRECTORY_SEPARATOR.'compte.php';

$contenu = ob_get_clean();
$titre = "gestion de compte";
$utilisateur = $_SESSION['utilisateur'];
$activeGestion = "active";
require $pathView.'Pages'.DIRECTORY_SEPARATOR.'administration'.DIRECTORY_SEPARATOR.'index.php';
