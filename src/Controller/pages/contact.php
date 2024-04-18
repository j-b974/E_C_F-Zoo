<?php
require_once (dirname(__DIR__,3).DIRECTORY_SEPARATOR.'vendor'.DIRECTORY_SEPARATOR.'autoload.php');
$pathView = dirname(__DIR__, 2) . DIRECTORY_SEPARATOR . 'View' .DIRECTORY_SEPARATOR;
use App\Model\DbZoo;
if (session_status() != PHP_SESSION_ACTIVE) {
    session_start();
}
$contact = new \App\Controller\entity\Contact();
$errors = [];
$infoMessage = false ;
if(isset($_POST['compte']))
{
    $validator = new \App\Controller\services\Validateur\ValideContact($_POST);
    \App\Controller\services\SetterObjet::hydrate($contact, $_POST , array_keys($_POST));
    if($validator->valideur())
    {
        $maileZoo = new \App\Controller\services\MailerZoo($contact->getAddressEmail() , $contact->getTitre() , $contact->getDescription());
       if($maileZoo->envoyer()) {

           header('Location:'.$router->url('home').'?contact=envoyer');

       }else{
           $infoMessage = true;
       }

    }else{
        $errors = $validator->get_errors();
    }

}
$htmlForm = new \App\Controller\services\BuildInput($contact , $errors);
$link = $router->url('contact');
$btnLabel ="envoyer";

ob_start();
require $pathView.'Pages'.DIRECTORY_SEPARATOR.'contact.php';
$contenu = ob_get_clean();
$titre = "Contactez nous";
$utilisateur = $_SESSION['utilisateur'] ?? false;
$contactActive ="active";
require $pathView.'index.php';