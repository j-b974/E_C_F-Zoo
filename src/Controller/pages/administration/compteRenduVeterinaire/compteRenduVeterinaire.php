<?php
require_once (dirname(__DIR__,5).DIRECTORY_SEPARATOR.'vendor'.DIRECTORY_SEPARATOR.'autoload.php');
$pathView = dirname(__DIR__, 4).DIRECTORY_SEPARATOR.'View'.DIRECTORY_SEPARATOR;
use App\Model\DbZoo;

//$db = DbZoo::connection();
\App\Controller\services\Verificateur::checkRole($router ,['veterinaire']);
$utilisateur = $_SESSION['utilisateur'];

$TcompteRendu = new \App\Model\repository\TableRapportVeterinaire(DbZoo::connection());
$allCompte = $TcompteRendu->getCompteRendusVeteriniareById($utilisateur->getId());
ob_start();

require $pathView.'Pages'.DIRECTORY_SEPARATOR.'administration'.DIRECTORY_SEPARATOR.'veterinaire'.DIRECTORY_SEPARATOR.'compteRenduVeterinaire.php';

$contenu = ob_get_clean();
$titre = "Compte Rendu Vétérinaire";
$activeVeterinaire = "active";

require $pathView.'Pages'.DIRECTORY_SEPARATOR.'administration'.DIRECTORY_SEPARATOR.'index.php';