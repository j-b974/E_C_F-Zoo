<?php
$avis = new \App\Controller\entity\Avis();
$errors = [];

$_POST['bonjours']= "ok";

$reponse= "";

if(isset($_POST['avis']))
{
    $validator = new \App\Controller\services\Validateur\ValideAvis($_POST);
    \App\Controller\services\SetterObjet::hydrate($avis,$_POST , ['pseudo', 'commentaire']);
    if($validator->valideur())
    {
        $tavis = new \App\Model\repository\TableAvis(\App\Model\DbZoo::connection());
        $tavis->addAvis($avis);
        //$_SERVER['REQUEST_URI'].='&avis=envoyer';
        $reponse = json_encode(['message'=>$_POST['pseudo']]);


    }else{
        $errors = $validator->get_errors();
       $reponse = json_encode(['errors'=> $errors]);
    }
}

header('Content-Type: application/json');
echo $reponse;

