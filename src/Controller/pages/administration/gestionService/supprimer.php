<?php
require_once (dirname(__DIR__,5).DIRECTORY_SEPARATOR.'vendor'.DIRECTORY_SEPARATOR.'autoload.php');

use App\Model\DbZoo;

//$db = DbZoo::connection();
\App\Controller\services\Verificateur::checkRole($router ,['administrateur']);

$Tservice = new \App\Model\repository\TableService(DbZoo::connection());
$service = $Tservice->getServiceById($params['id']);
\App\Controller\services\UploadImageZoo::deleteImage($service , 'services');
$Tservice->delectService($service);

header('Location:'.$router->url('serviceSupprimer').'?supression='.$service->getNom());
exit();