<?php
require_once (dirname(__DIR__,5).DIRECTORY_SEPARATOR.'vendor'.DIRECTORY_SEPARATOR.'autoload.php');

use App\Model\DbZoo;

//$db = DbZoo::connection();
\App\Controller\services\Verificateur::checkRole($router ,['administrateur']);

$Thabitat = new \App\Model\repository\TableHabitat(DbZoo::connection());
$habitat = $Thabitat->getHabitatById((int) $params['id']);
$Thabitat->delectHabitat($habitat);
header('Location:'.$router->url('habitat').'?supression='.$habitat->getNom());
exit();