<?php
require_once (dirname(__DIR__,5).DIRECTORY_SEPARATOR.'vendor'.DIRECTORY_SEPARATOR.'autoload.php');
$pathView = dirname(__DIR__, 4).DIRECTORY_SEPARATOR.'View'.DIRECTORY_SEPARATOR;

use App\Model\DbZoo;

\App\Controller\services\Verificateur::checkRole($router ,['veterinaire']);


$TcompteRendu = new \App\Model\repository\TableRapportVeterinaire(DbZoo::connection());

$utilisateur = $_SESSION['utilisateur'];

// ==================== restrindre au utilisateur ===============

$allCompte = $TcompteRendu->getCompteRendusVeteriniareById($utilisateur->getId());
$lstIdRapport = [];
foreach($allCompte as $rapport)
{
    $lstIdRapport[] = $rapport->getId();
}

\App\Controller\services\Verificateur::checkRestrition($params['id'] , $lstIdRapport,$router);
// ================================================================

$Tanimal = new \App\Model\repository\TableAnimal(DbZoo::connection());

$CompteRendu = $TcompteRendu->getCompteRenduById( (int) $params['id'] ) ;
$TrapportEmploy = new \App\Model\repository\TableRapportEmploye(DbZoo::connection());
$allCompte= $TrapportEmploy->getAllRapportEmployeByIdAnimal($CompteRendu->getAnimal()->getId());

ob_start();

require $pathView.'Pages'.DIRECTORY_SEPARATOR.'administration'.DIRECTORY_SEPARATOR.'veterinaire'.DIRECTORY_SEPARATOR.'sigleCompteRendu.php';

$contenu = ob_get_clean();
$titre = "Compte Rendu";
$activeVeterinaire = "active";

require $pathView.'Pages'.DIRECTORY_SEPARATOR.'administration'.DIRECTORY_SEPARATOR.'index.php';