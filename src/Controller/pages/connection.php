<?php
require_once (dirname(__DIR__,3).DIRECTORY_SEPARATOR.'vendor'.DIRECTORY_SEPARATOR.'autoload.php');
$pathView = dirname(__DIR__, 2) . DIRECTORY_SEPARATOR . 'View' .DIRECTORY_SEPARATOR;
use App\Model\DbZoo;

\App\Controller\services\Verificateur::verifieNonConnection($router);


if(isset($_POST['connection']))
{

    $Tutilisateur = new \App\Model\repository\TableUtilisateur(DbZoo::connection());
    $v = new \App\Controller\services\Validateur\valideConnection($_POST , $Tutilisateur );


    if($v->valideur())
    {
        $name = htmlentities($_POST['username']);
        $utilisateur = $Tutilisateur->getUtilisateurByName($name);

        if (session_status() == PHP_SESSION_NONE)
        {
            session_start();
        }

        $_SESSION['utilisateur']=$utilisateur;
        header('Location:'.$router->url('dashboard'));
        exit();

    }else
    {
        $error = $v->get_errors();

    }
}

ob_start();

require $pathView.'Pages'.DIRECTORY_SEPARATOR.'connection.php';

$contenu = ob_get_clean();
$titre = "Connection Employer ";

require $pathView.'index.php';