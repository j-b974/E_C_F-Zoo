<?php
require dirname(__DIR__).'/vendor/autoload.php';

$bdd = \App\Model\DbZoo::connection();

$faker = Faker\Factory::create('fr_FR');

$Tavis = new \App\Model\repository\TableAvis($bdd);
for($i=0;$i<= 7 ;$i++)
{
    $avis = new \App\Controller\entity\Avis();
    $avis->setPseudo($faker->firstName);
    $avis->setCommentaire($faker->realText(90));
    $Tavis->addAvis($avis);
}


echo "Terminé !!!";