<?php
require_once (dirname(__DIR__,5).DIRECTORY_SEPARATOR.'vendor'.DIRECTORY_SEPARATOR.'autoload.php');
$pathView = dirname(__DIR__, 4).DIRECTORY_SEPARATOR.'View'.DIRECTORY_SEPARATOR;
use App\Model\DbZoo;

//$db = DbZoo::connection();
\App\Controller\services\Verificateur::checkRole($router ,['employer']);

$utilisateur = $_SESSION['utilisateur'];

$TcompteRenduEmploye = new \App\Model\repository\TableRapportEmploye(DbZoo::connection());

$allCompte = $TcompteRenduEmploye->getAllRapportByEmployeId($utilisateur->getId());

ob_start();

require $pathView.'Pages'.DIRECTORY_SEPARATOR.'administration'.DIRECTORY_SEPARATOR.'employer'.DIRECTORY_SEPARATOR.'compteRenduEmployer.php';

$contenu = ob_get_clean();
$titre = "Compte Rendu Employer";
$activeEmployerCompteRendu = "active";

require $pathView.'Pages'.DIRECTORY_SEPARATOR.'administration'.DIRECTORY_SEPARATOR.'index.php';