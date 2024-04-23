<?php

require_once(dirname(__DIR__, 5) . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php');
$pathView = dirname(__DIR__, 4) . DIRECTORY_SEPARATOR . 'View' . DIRECTORY_SEPARATOR;

use App\Model\DbZoo;

//$db = DbZoo::connection();
\App\Controller\services\Verificateur::checkRole($router, ['administrateur','employer']);

$Tavis = new \App\Model\repository\TableAvis(DbZoo::connection());

$id = $params['id'];
if($id > 0)
{
    $avis = $Tavis->getAvisById($id);
    $avis->setIsVisible(true);
    $Tavis->UpdateAvis($avis);
    unset($avis);
}

$lstAvis = $Tavis->getAllAvis();
$lstAvisVisible = [];
$lstAvisNonVisible = [];

$lstAvisVisible = array_filter($lstAvis, function($avis){
    return $avis->isVisible();
});
$lstAvisNonVisible = array_filter($lstAvis, function($avis){
    return !$avis->isVisible();
});

ob_start();

require $pathView . 'Pages' . DIRECTORY_SEPARATOR . 'administration' . DIRECTORY_SEPARATOR . 'avis.php';

$contenu = ob_get_clean();
$titre = "gestion des avis";
$utilisateur = $_SESSION['utilisateur'];
$activeAvisVisiteur = "active";
require $pathView . 'Pages' . DIRECTORY_SEPARATOR . 'administration' . DIRECTORY_SEPARATOR . 'index.php';
