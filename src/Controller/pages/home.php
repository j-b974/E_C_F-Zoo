<?php
require_once (dirname(__DIR__,3).DIRECTORY_SEPARATOR.'vendor'.DIRECTORY_SEPARATOR.'autoload.php');
$pathView = dirname(__DIR__, 2) . DIRECTORY_SEPARATOR . 'View' .DIRECTORY_SEPARATOR;
use App\Model\DbZoo;

$db = DbZoo::connection();
$avis = new \App\Controller\entity\Avis();
$avis->setPseudo('aaaa')->setCommentaire('0000')->setIsVisible(True)
    ->setId(1);
$Tavis = new \App\Model\repository\TableAvis($db);
$Tavis->delectAvis($avis);

ob_start();
?>
    <h1 class = text-center > teste de routage </h1>
<?php
$contenu = ob_get_clean();
$titre = "Zoo de josé";

require $pathView.'index.php';
