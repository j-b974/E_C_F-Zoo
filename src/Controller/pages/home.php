<?php
require_once (dirname(__DIR__,3).DIRECTORY_SEPARATOR.'vendor'.DIRECTORY_SEPARATOR.'autoload.php');
$pathView = dirname(__DIR__, 2) . DIRECTORY_SEPARATOR . 'View' .DIRECTORY_SEPARATOR;
use App\Model\DbZoo;

$db = DbZoo::connection();
$Tuseur = new \App\Model\repository\TableUtilisateur($db);
$user = new \App\Controller\entity\Utilisateur();
$role = new \App\Controller\entity\Role();
$role->setId(9);
$user->setUsername('aduhamel@lemaitre.fr')
    ->setNom('0000')
    ->setPrenom('99999')
    ->setPassword('1111')
    ->setRole($role);
$Tuseur->delectUtilisateur($user);

ob_start();
?>
    <h1 class = text-center > teste de routage </h1>
<?php
$contenu = ob_get_clean();
$titre = "Zoo de josé";

require $pathView.'index.php';
