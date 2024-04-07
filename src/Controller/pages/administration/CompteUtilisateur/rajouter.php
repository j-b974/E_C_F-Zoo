<?php
require_once (dirname(__DIR__,5).DIRECTORY_SEPARATOR.'vendor'.DIRECTORY_SEPARATOR.'autoload.php');
$pathView = dirname(__DIR__, 4).DIRECTORY_SEPARATOR.'View'.DIRECTORY_SEPARATOR;
use App\Model\DbZoo;

//$db = DbZoo::connection();
\App\Controller\services\Verificateur::checkRole($router ,['administrateur']);
$user = new \App\Controller\entity\Utilisateur();
$errors = [];

if(isset($_POST['compte']))
{
    $Tutilisateur = new \App\Model\repository\TableUtilisateur(DbZoo::connection());
    $validator = new \App\Controller\services\Validateur\ValideGestionCompte($_POST);
    $user = \App\Controller\services\SetterObjet::hydrate($user, $_POST, array_keys($_POST), 'label');

    $Trole = new \App\Model\repository\TableRole(DbZoo::connection());
    if(isset($_POST['label'])){
        $label = htmlentities($_POST['label']);
        $user->setRole($Trole->getRoleByLabel($label));
    }


    if($validator->valideur()) {
        $Tutilisateur->addUtilisateur($user);
        header('Location:'.$router->url('compte').'?infos=creer');
    }else{
                $errors= $validator->get_errors();
    }

}
$htmlForm = new \App\Controller\services\BuildInput($user,$errors);
$link = $router->url('addCompte');
$btnLabel ="Créer";
ob_start();

require $pathView.'template'.DIRECTORY_SEPARATOR.'Formulaire'.DIRECTORY_SEPARATOR.'gestionCompte.php';

$contenu = ob_get_clean();

$titre = "création de compte utilisateur";
$utilisateur = $_SESSION['utilisateur'];
$activeGestion = "active";

require $pathView.'Pages'.DIRECTORY_SEPARATOR.'administration'.DIRECTORY_SEPARATOR.'index.php';
