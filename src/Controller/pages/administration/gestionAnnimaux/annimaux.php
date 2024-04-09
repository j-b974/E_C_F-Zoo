<?php
require_once (dirname(__DIR__,5).DIRECTORY_SEPARATOR.'vendor'.DIRECTORY_SEPARATOR.'autoload.php');
$pathView = dirname(__DIR__, 4).DIRECTORY_SEPARATOR.'View'.DIRECTORY_SEPARATOR;
use App\Model\DbZoo;

//$db = DbZoo::connection();
\App\Controller\services\Verificateur::checkRole($router ,['administrateur']);

$Tannimaux = new \App\Model\repository\TableAnimal(DbZoo::connection());
$allAnnimaux = $Tannimaux->getAllAnnimal();

ob_start();

require $pathView.'Pages'.DIRECTORY_SEPARATOR.'administration'.DIRECTORY_SEPARATOR.'annimaux.php';

$contenu = ob_get_clean();
$titre = "gestion d'annimaux";
$utilisateur = $_SESSION['utilisateur'];
$activeAnnimaux = "active";
require $pathView.'Pages'.DIRECTORY_SEPARATOR.'administration'.DIRECTORY_SEPARATOR.'index.php';
