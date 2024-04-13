<?php
require_once (dirname(__DIR__,5).DIRECTORY_SEPARATOR.'vendor'.DIRECTORY_SEPARATOR.'autoload.php');
$pathView = dirname(__DIR__, 4).DIRECTORY_SEPARATOR.'View'.DIRECTORY_SEPARATOR;

use App\Model\DbZoo;

\App\Controller\services\Verificateur::checkRole($router ,['employer']);

$utilisateur = $_SESSION['utilisateur'];

$Tanimal = new \App\Model\repository\TableAnimal(DbZoo::connection());

$comptRendu = new \App\Controller\entity\RapportEmploye();

$errors = [];

// ================= formate donnéé ! ==============

$lstAnimaux = $Tanimal->getAllAnnimal();
$lstAnimal = [];
foreach ($lstAnimaux as $animal)
{
    $lstAnimal[$animal->getId()] = $animal->getPrenom();
}

$animalSelect = null; // pour active de select

// ======================= traitement du formulaire ============
if(isset($_POST['compte'])){


    $validator = new \App\Controller\services\Validateur\ValideCompteRenduEmployer($_POST, $lstAnimaux);

    \App\Controller\services\SetterObjet::hydrate($comptRendu , $_POST, array_keys($_POST),'animal');

    $animalSelect = (int) $_POST['animal'];

    if($validator->valideur())
    {
        $comptRendu->setEmployeId($utilisateur);
        $TcomteRendu = new \App\Model\repository\TableRapportEmploye(DbZoo::connection());
        $TcomteRendu->addRapportEmploye($comptRendu ,$animalSelect );
        header('Location:'.$router->url('compteRenduEmploye').'?CompteRenduVeto=creer');
    }else{
        $errors = $validator->get_errors();
    }
}

$htmlForm = new \App\Controller\services\BuildInput($comptRendu , $errors);

$link = $router->url('compteRenduEmployeRediger') ;
$btnLabel ="Créer";

ob_start();

require $pathView.'template'.DIRECTORY_SEPARATOR.'Formulaire'.DIRECTORY_SEPARATOR.'gestionCompteRenduEmployer.php';

$contenu = ob_get_clean();
$titre = "Compte Rendu Employer Rediger";
$activeEmployerCompteRendu = "active";

require $pathView.'Pages'.DIRECTORY_SEPARATOR.'administration'.DIRECTORY_SEPARATOR.'index.php';
