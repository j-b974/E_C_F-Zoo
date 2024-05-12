<?php
require_once (dirname(__DIR__,5).DIRECTORY_SEPARATOR.'vendor'.DIRECTORY_SEPARATOR.'autoload.php');
$pathView = dirname(__DIR__, 4).DIRECTORY_SEPARATOR.'View'.DIRECTORY_SEPARATOR;
use App\Model\DbZoo;

\App\Controller\services\Verificateur::checkRole($router ,['administrateur']);

$Tservice = new \App\Model\repository\TableService(DbZoo::connection());

$service = new \App\Controller\entity\Service();
$errors= [];
if(isset($_POST['compte']))
{
    $validator = new \App\Controller\services\Validateur\ValideService(array_merge($_POST,$_FILES));
    \App\Controller\services\SetterObjet::hydrate($service,$_POST,array_keys($_POST), 'image');

    if($validator->valideur()){

        $Tservice->addService($service);
        header('Location:'.$router->url('service').'?infosService=creer');

    }else{
        $errors = $validator->get_errors();
    }
}


$htmlForm = new \App\Controller\services\BuildInput($service,$errors);
$link = $router->url('serviceRajouter');
$btnLabel ="Créer Service";
ob_start();

require $pathView.'template'.DIRECTORY_SEPARATOR.'Formulaire'.DIRECTORY_SEPARATOR.'gestionService.php';

$contenu = ob_get_clean();
$titre = "gestion de service";
$utilisateur = $_SESSION['utilisateur'];
$activeGestionService = "active";
require $pathView.'Pages'.DIRECTORY_SEPARATOR.'administration'.DIRECTORY_SEPARATOR.'index.php';
