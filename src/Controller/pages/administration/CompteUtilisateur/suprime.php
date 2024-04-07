<?php
require_once (dirname(__DIR__,5).DIRECTORY_SEPARATOR.'vendor'.DIRECTORY_SEPARATOR.'autoload.php');

use App\Model\DbZoo;

//$db = DbZoo::connection();
\App\Controller\services\Verificateur::checkRole($router ,['administrateur']);

$Tutilisateur = new \App\Model\repository\TableUtilisateur(DbZoo::connection());
$user = $Tutilisateur->getUtilisateurByID($params['id']);
$Tutilisateur->delectUtilisateur($user);

header('Location:'.$router->url('compte').'?supression='.$user->getUsername());
exit();