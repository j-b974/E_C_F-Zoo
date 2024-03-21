<?php
require_once (dirname(__DIR__,3).DIRECTORY_SEPARATOR.'vendor'.DIRECTORY_SEPARATOR.'autoload.php');
$pathView = dirname(__DIR__, 2) . DIRECTORY_SEPARATOR . 'View' .DIRECTORY_SEPARATOR;
use App\Model\DbZoo;


$db = DbZoo::connection();
$db->exec("CREATE TABLE IF NOT EXISTS testTable(
    id int(255) UNSIGNED NOT NULL PRIMARY KEY)");
ob_start();
?>
    <h1 class = text-center > teste de routage </h1>
<?php
$contenu = ob_get_clean();
$titre = "Zoo de josé";

require $pathView.'index.php';
