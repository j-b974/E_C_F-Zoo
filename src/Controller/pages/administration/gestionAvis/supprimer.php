<?php

require_once(dirname(__DIR__, 5) . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php');

use App\Model\DbZoo;

//$db = DbZoo::connection();
\App\Controller\services\Verificateur::checkRole($router, ['administrateur','employer']);

$Tavis = new \App\Model\repository\TableAvis(DbZoo::connection());
$id = (int) $params['id'];
$avis = null;
if($id>0)
{
    $avis = $Tavis->getAvisById($id);
    $Tavis->delectAvis($avis);
}

header('Location:' . $router->url('gestionAvis',['id'=> 0]) . '?supression=' . $avis->getPseudo());
exit();