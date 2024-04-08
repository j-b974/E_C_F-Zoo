<?php
require_once (dirname(__DIR__,5).DIRECTORY_SEPARATOR.'vendor'.DIRECTORY_SEPARATOR.'autoload.php');
$pathView = dirname(__DIR__, 4).DIRECTORY_SEPARATOR.'View'.DIRECTORY_SEPARATOR;
use App\Model\DbZoo;

//$db = DbZoo::connection();
\App\Controller\services\Verificateur::checkRole($router ,['administrateur']);

$errors = [];
$habitat = new \App\Controller\entity\Habitat();
if(isset($_POST['compte']))
{

    $validator = new \App\Controller\services\Validateur\ValideHabitat($_POST);

     \App\Controller\services\SetterObjet::hydrate($habitat, $_POST, array_keys($_POST), );


    if($validator->valideur()) {
        $THabitat =new \App\Model\repository\TableHabitat(DbZoo::connection()
        );
        $THabitat->addHabitat($habitat);
        header('Location:'.$router->url('habitat').'?habitat=creer');
    }else{
        $errors= $validator->get_errors();
    }

}
$htmlForm = new \App\Controller\services\BuildInput($habitat,$errors);
$link = $router->url('habitatCreer');
$btnLabel ="Rajouter un Habitat";
ob_start();

require $pathView.'template'.DIRECTORY_SEPARATOR.'Formulaire'.DIRECTORY_SEPARATOR.'gestionHabitat.php';

$contenu = ob_get_clean();

$titre = "création d\'habitat annimaux";
$utilisateur = $_SESSION['utilisateur'];
$activeHabitat = "active";

require $pathView.'Pages'.DIRECTORY_SEPARATOR.'administration'.DIRECTORY_SEPARATOR.'index.php';
