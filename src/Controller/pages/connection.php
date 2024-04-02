<?php
require_once (dirname(__DIR__,3).DIRECTORY_SEPARATOR.'vendor'.DIRECTORY_SEPARATOR.'autoload.php');
$pathView = dirname(__DIR__, 2) . DIRECTORY_SEPARATOR . 'View' .DIRECTORY_SEPARATOR;
use App\Model\DbZoo;

//$db = DbZoo::connection();

ob_start();

require $pathView.'Pages'.DIRECTORY_SEPARATOR.'connection.php';

$contenu = ob_get_clean();
$titre = "Connection Employer ";

require $pathView.'index.php';