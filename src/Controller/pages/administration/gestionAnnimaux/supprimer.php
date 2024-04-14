<?php
require_once (dirname(__DIR__,5).DIRECTORY_SEPARATOR.'vendor'.DIRECTORY_SEPARATOR.'autoload.php');

use App\Model\DbZoo;

//$db = DbZoo::connection();
\App\Controller\services\Verificateur::checkRole($router ,['administrateur']);

$Tanimal = new \App\Model\repository\TableAnimal(DbZoo::connection());

$animal = $Tanimal->getAnimalById((int) $params['id']);
$Tanimal->delectAnimal($animal);
header('Location:'.$router->url('annimaux').'?supression='.$animal->getPrenom());
exit();