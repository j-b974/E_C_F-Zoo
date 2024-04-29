<?php
require_once (dirname(__DIR__,4).DIRECTORY_SEPARATOR.'vendor'.DIRECTORY_SEPARATOR.'autoload.php');
$pathView = dirname(__DIR__, 3).DIRECTORY_SEPARATOR.'View'.DIRECTORY_SEPARATOR;
use App\Model\DbZoo;


\App\Controller\services\Verificateur::verifieConnection($router);

$Tanimaux = new \App\Model\repository\TableAnimal(DbZoo::connection());
$lstAnimaux = [];

//========= mongodb ===========
$mongodbZoo = \App\Model\MongodbZoo::connection();
$collectionVue = $mongodbZoo->vue_animal;
$pipeline =[
    [
        '$group' => [
            '_id'=> '$animalId',
            'count'=> ['$sum'=> 1]
        ]
    ],
    ['$sort'=>['count'=> -1]]
];
$cursor = $collectionVue->aggregate($pipeline);
// =================
foreach($cursor as $document) {
    $animal  = $Tanimaux->getAnimalById($document['_id']);
    $animal->setVue($document['count']);
    $lstAnimaux[] = $animal;
}

ob_start();
require $pathView.'Pages'.DIRECTORY_SEPARATOR.'administration'.DIRECTORY_SEPARATOR.'board.php';

$contenu = ob_get_clean();
$titre = "administration";
$utilisateur = $_SESSION['utilisateur'];
require $pathView.'Pages'.DIRECTORY_SEPARATOR.'administration'.DIRECTORY_SEPARATOR.'index.php';