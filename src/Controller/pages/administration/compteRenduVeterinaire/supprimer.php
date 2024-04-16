<?php
require_once (dirname(__DIR__,5).DIRECTORY_SEPARATOR.'vendor'.DIRECTORY_SEPARATOR.'autoload.php');
$pathView = dirname(__DIR__, 4).DIRECTORY_SEPARATOR.'View'.DIRECTORY_SEPARATOR;

use App\Model\DbZoo;

\App\Controller\services\Verificateur::checkRole($router ,['veterinaire']);

$TcompteRendu = new \App\Model\repository\TableRapportVeterinaire(DbZoo::connection());

$utilisateur = $_SESSION['utilisateur'];

$allCompte = $TcompteRendu->getCompteRendusVeteriniareById($utilisateur->getId());

$lstIdRapport = [];
foreach($allCompte as $rapport)
{
    $lstIdRapport[] = $rapport->getId();
}

\App\Controller\services\Verificateur::checkRestrition($params['id'] , $lstIdRapport, $router);

$Rapport = $TcompteRendu->getCompteRenduById((int) $params['id']);
$TcompteRendu->delectRapportVeterinaire($Rapport);
header('Location:'.$router->url('comptRenduVeto').'?supression='.$Rapport->getId());
exit();
