<?php
require_once (dirname(__DIR__,5).DIRECTORY_SEPARATOR.'vendor'.DIRECTORY_SEPARATOR.'autoload.php');
$pathView = dirname(__DIR__, 4).DIRECTORY_SEPARATOR.'View'.DIRECTORY_SEPARATOR;

use App\Model\DbZoo;

\App\Controller\services\Verificateur::checkRole($router ,['employer']);

$utilisateur = $_SESSION['utilisateur'];

// ================= pour restrindre au utiliseur accée =============

$TcomteRendu = new \App\Model\repository\TableRapportEmploye(DbZoo::connection());

$allCompte = $TcomteRendu->getAllRapportByEmployeId($utilisateur->getId());
$lstIdRapport = [];
foreach($allCompte as $rapport)
{
    $lstIdRapport[] = $rapport->getId();
}

$Tanimal = new \App\Model\repository\TableAnimal(DbZoo::connection());

$comptRendu = $TcomteRendu->getCompteRenduById((int) $params['id']);

\App\Controller\services\Verificateur::checkRestrition($params['id'] , $lstIdRapport,$router);

$TcomteRendu->deleteRapportEmploy($comptRendu);
header('Location:'.$router->url('compteRenduEmploye').'?supression='.$comptRendu->getId());
exit();