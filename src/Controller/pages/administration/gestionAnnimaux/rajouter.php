<?php
require_once (dirname(__DIR__,5).DIRECTORY_SEPARATOR.'vendor'.DIRECTORY_SEPARATOR.'autoload.php');
$pathView = dirname(__DIR__, 4).DIRECTORY_SEPARATOR.'View'.DIRECTORY_SEPARATOR;
use App\Model\DbZoo;

//$db = DbZoo::connection();
\App\Controller\services\Verificateur::checkRole($router ,['administrateur']);

$animaux = new \App\Controller\entity\Animal();
$Trace = new \App\Model\repository\TableRace(DbZoo::connection());
$lstRace=$Trace->getAllRaceArray();

$Thabitat = new \App\Model\repository\TableHabitat(DbZoo::connection());
$lsthabitat = $Thabitat->getListeNom();
$errors = [];


if(isset($_POST['compte']))
{
    $data = array_merge($_POST , $_FILES);
    $validator = new \App\Controller\services\Validateur\ValideAnnimale($data, $lstRace, $lsthabitat);
     \App\Controller\services\SetterObjet::hydrate($animaux,$data,array_keys($data),['raceID','habitatID']);

    $race = new \App\Controller\entity\Race();
    $race->setId((int)$_POST['label']);

    $habitat = new \App\Controller\entity\Habitat();
    $habitat->setId((int) $_POST['nom']);

    $animaux->setRace($race)->setHabitat($habitat);

    if($validator->valideur()) {
        $Tanimaux = new \App\Model\repository\TableAnimal(DbZoo::connection());
        \App\Controller\services\UploadImageZoo::upload($animaux , 'animaux');
        $Tanimaux->addAnimal($animaux);
        header('Location:'.$router->url('annimaux').'?annimaux=creer');
    }else{
        $errors= $validator->get_errors();
    }

}
$htmlForm = new \App\Controller\services\BuildInput($animaux,$errors);
$link = $router->url('annimauxRajouter');
$btnLabel ="Ajouter";
ob_start();

require $pathView.'template'.DIRECTORY_SEPARATOR.'Formulaire'.DIRECTORY_SEPARATOR.'gestionAnnimaux.php';

$contenu = ob_get_clean();

$titre = "Ajout d\'un anniamle";
$utilisateur = $_SESSION['utilisateur'];
$activeAnnimaux = "active";

require $pathView.'Pages'.DIRECTORY_SEPARATOR.'administration'.DIRECTORY_SEPARATOR.'index.php';
