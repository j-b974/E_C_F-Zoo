<?php
require_once (dirname(__DIR__,3).DIRECTORY_SEPARATOR.'vendor'.DIRECTORY_SEPARATOR.'autoload.php');
$pathView = dirname(__DIR__, 2) . DIRECTORY_SEPARATOR . 'View' .DIRECTORY_SEPARATOR;
use App\Model\DbZoo;

$db = DbZoo::connection();
$Tuseur = new \App\Model\repository\TableUtilisateur($db);
$user = new \App\Controller\entity\Utilisateur();
$role = new \App\Controller\entity\Role();
$role->setId(3);
$user->setUsername('benjamin.')
    ->setNom('777777777')
    ->setPrenom('7777777')
    ->setPassword('00000')
    ->setRole($role);
$Tuseur->addUtilisateur($user);

ob_start();
?>
    <h1 class = text-center > teste de routage </h1>
<?php
$contenu = ob_get_clean();
$titre = "Zoo de josé";

require $pathView.'index.php';
