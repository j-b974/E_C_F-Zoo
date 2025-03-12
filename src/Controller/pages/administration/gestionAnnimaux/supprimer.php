<?php
require_once (dirname(__DIR__,5).DIRECTORY_SEPARATOR.'vendor'.DIRECTORY_SEPARATOR.'autoload.php');

use App\Model\DbZoo;

//$db = DbZoo::connection();
\App\Controller\services\Verificateur::checkRole($router ,['administrateur']);

$Tanimal = new \App\Model\repository\TableAnimal(DbZoo::connection());

$animal = $Tanimal->getAnimalById((int) $params['id']);
\App\Controller\services\UploadImageZoo::deleteImage($animal , 'animaux');
$Tanimal->delectAnimal($animal);

// ======= Suppression des document lien a l'animal ======
    // connection Mongodb
$dbZoo = \App\Model\MongodbZoo::connection();
    // recupere la  collection
$collection = $dbZoo->vue_animal;
    // suppresion des Vues
$collection->deleteMany(['animalId'=> $animal->getId()]);

// =======================================================
header('Location:'.$router->url('annimaux').'?supression='.$animal->getPrenom());
exit();