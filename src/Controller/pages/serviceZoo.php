<?php
require_once (dirname(__DIR__,3).DIRECTORY_SEPARATOR.'vendor'.DIRECTORY_SEPARATOR.'autoload.php');
$pathView = dirname(__DIR__, 2) . DIRECTORY_SEPARATOR . 'View' .DIRECTORY_SEPARATOR;
use App\Model\DbZoo;
if (session_status() != PHP_SESSION_ACTIVE) {
session_start();
}
$TService = new \App\Model\repository\TableService(DbZoo::connection());
$lstService = $TService->getAllservice();

ob_start();
    require $pathView.'Pages'.DIRECTORY_SEPARATOR.'serviceZoo.php';
$contenu = ob_get_clean();
$titre = "les Service du Zoo de josé";
$utilisateur = $_SESSION['utilisateur'] ?? false;
$serviceActive ="active";
require $pathView.'index.php';