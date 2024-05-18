<?php
require_once (dirname(__DIR__,5).DIRECTORY_SEPARATOR.'vendor'.DIRECTORY_SEPARATOR.'autoload.php');
$pathView = dirname(__DIR__, 4).DIRECTORY_SEPARATOR.'View'.DIRECTORY_SEPARATOR;
use App\Model\DbZoo;

\App\Controller\services\Verificateur::checkRole($router ,['administrateur']);

$errors = [];
$THabitat =new \App\Model\repository\TableHabitat(DbZoo::connection());
$habitat = $THabitat->getHabitatById((int) $params['id']);
if(!$habitat)
{
    $router->getErrorPage();
    exit();
}

if(isset($_POST['compte']))
{
    $data = array_merge($_POST , $_FILES);
    $validator = new \App\Controller\services\Validateur\ValideHabitat($data);

    \App\Controller\services\SetterObjet::hydrate($habitat, $data, array_keys($data) );


    if($validator->valideur()) {

        \App\Controller\services\UploadImageZoo::upload($habitat , 'habitat');
        $THabitat->UpdateHabitat($habitat);
        header('Location:'.$router->url('habitat').'?habitat=modifier');
    }else{
        $errors= $validator->get_errors();
    }

}
$htmlForm = new \App\Controller\services\BuildInput($habitat,$errors);
$link = $router->url('habitatModifier',['id'=> $habitat->getId()]);
$btnLabel ="Modification Habitat";
ob_start();

require $pathView.'template'.DIRECTORY_SEPARATOR.'Formulaire'.DIRECTORY_SEPARATOR.'gestionHabitat.php';

$contenu = ob_get_clean();

$titre = "Modification de l'habitat annimaux";
$utilisateur = $_SESSION['utilisateur'];
$activeHabitat = "active";

require $pathView.'Pages'.DIRECTORY_SEPARATOR.'administration'.DIRECTORY_SEPARATOR.'index.php';
