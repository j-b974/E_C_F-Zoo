<?php
require_once (dirname(__DIR__,3).DIRECTORY_SEPARATOR.'vendor'.DIRECTORY_SEPARATOR.'autoload.php');
$pathView = dirname(__DIR__, 2) . DIRECTORY_SEPARATOR . 'View' .DIRECTORY_SEPARATOR;
use App\Model\DbZoo;
if (session_status() != PHP_SESSION_ACTIVE) {
    session_start();
}
$Tservice = new \App\Model\repository\TableService(DbZoo::connection());
$lstServices = $Tservice->getAllservice();
//  ======== tire au sort 2 service =============
$lstService = [];
$randKey = array_rand($lstServices , 2);
foreach ($randKey as $key)
{
    $lstService[] = $lstServices[$key];
}

// ================== tire au sort 2 habitat ========================
$Thabitat = new \App\Model\repository\TableHabitat(DbZoo::connection());
$habitats = $Thabitat->getAllHabitat();
$randKey = array_rand($habitats , 2 );
$lstHabitat = [];
foreach ($randKey as $key)
{
    $lstHabitat[] = $habitats[$key];
}
// =================== tire au sort 5 animaux =========================

$Tanimal = new \App\Model\repository\TableAnimal(DbZoo::connection());
$animals = $Tanimal->getAllAnnimal();
$randKey = array_rand($animals , 5);
$lstAnimal = [];
foreach ($randKey as $key)
{
    $lstAnimal[]= $animals[$key];
}
ob_start();

    require $pathView.'Pages'.DIRECTORY_SEPARATOR.'home.php';

$contenu = ob_get_clean();
$titre = "Zoo de josé";
$utilisateur = $_SESSION['utilisateur'] ?? false;
require $pathView.'index.php';
