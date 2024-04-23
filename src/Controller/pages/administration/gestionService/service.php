<?php
require_once (dirname(__DIR__,5).DIRECTORY_SEPARATOR.'vendor'.DIRECTORY_SEPARATOR.'autoload.php');
$pathView = dirname(__DIR__, 4).DIRECTORY_SEPARATOR.'View'.DIRECTORY_SEPARATOR;
use App\Model\DbZoo;

//$db = DbZoo::connection();
\App\Controller\services\Verificateur::checkRole($router ,['administrateur','employer']);
$Tservice = new \App\Model\repository\TableService(DbZoo::connection());
$allService = $Tservice->getAllservice();
$utilisateur = $_SESSION['utilisateur'];
ob_start();

require $pathView.'Pages'.DIRECTORY_SEPARATOR.'administration'.DIRECTORY_SEPARATOR.'service.php';

$contenu = ob_get_clean();
$titre = "gestion de service";

$activeGestionService = "active";
require $pathView.'Pages'.DIRECTORY_SEPARATOR.'administration'.DIRECTORY_SEPARATOR.'index.php';
