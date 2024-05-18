<?php
require_once (dirname(__DIR__,5).DIRECTORY_SEPARATOR.'vendor'.DIRECTORY_SEPARATOR.'autoload.php');
$pathView = dirname(__DIR__, 4).DIRECTORY_SEPARATOR.'View'.DIRECTORY_SEPARATOR;

use App\Model\DbZoo;

\App\Controller\services\Verificateur::checkRole($router ,['veterinaire']);

$TcompteRendu = new \App\Model\repository\TableRapportVeterinaire(DbZoo::connection());
$comptRendu = $TcompteRendu->getCompteRenduById( (int) $params['id'] ) ;
if(!$comptRendu)
{
    $router->getErrorPage();
    exit();
}


$utilisateur = $_SESSION['utilisateur'];
$allCompte = $TcompteRendu->getCompteRendusVeteriniareById($utilisateur->getId());
$lstIdRapport = [];
foreach($allCompte as $rapport)
{
    $lstIdRapport[] = $rapport->getId();
}

\App\Controller\services\Verificateur::checkRestrition( $comptRendu->getId(), $lstIdRapport, $router);

$Tanimal = new \App\Model\repository\TableAnimal(DbZoo::connection());

$errors = [];

// ================= formate donnéé ! ==============

$lstAnimaux = $Tanimal->getAllAnnimal();
$lstAnimal = [];
foreach ($lstAnimaux as $animal)
{
    $lstAnimal[$animal->getId()] = $animal->getPrenom();
}

$animalSelect = $comptRendu->getAnimal()->getId();// pour active de select

// ======================= traitement du formulaire ============
if(isset($_POST['compte'])){

    $validator = new \App\Controller\services\Validateur\ValideCompteRenduVeterinaire($_POST, $lstAnimaux);

    \App\Controller\services\SetterObjet::hydrate($comptRendu , $_POST, array_keys($_POST),'animal');

    $animalSelect = (int) $_POST['animal'];

    if($validator->valideur())
    {
        $comptRendu->setVeterinaire($utilisateur);
        $TcompteRendu->UpdateRapportVeterinaire($comptRendu ,$animalSelect );
        header('Location:'.$router->url('modifierCompteRenduVeto',['id'=> $comptRendu->getId()]).'?CompteRenduVeto=modifier',true , 301);
    }else{
        $errors = $validator->get_errors();
    }
}

$htmlForm = new \App\Controller\services\BuildInput($comptRendu , $errors);

$link = $router->url('modifierCompteRenduVeto',['id'=> $comptRendu->getId()]) ;
$btnLabel ="modifier !";

ob_start();

require $pathView.'Pages'.DIRECTORY_SEPARATOR.'administration'.DIRECTORY_SEPARATOR.'veterinaire'.DIRECTORY_SEPARATOR.'gestionCompteRendu.php';

$contenu = ob_get_clean();
$titre = "Modifier votre compte rendu Vétérinaire";
$activeVeterinaire = "active";

require $pathView.'Pages'.DIRECTORY_SEPARATOR.'administration'.DIRECTORY_SEPARATOR.'index.php';
