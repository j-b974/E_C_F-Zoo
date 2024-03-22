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
$Tservice = new \App\Model\repository\TableService($bdd);
for($i=0;$i<=7;$i++)
{
    $service = new \App\Controller\entity\Service();
    $service->setNom($faker->lastName());
    $service->setDescription($faker->realText(90));

    $Tservice->addService($service);
}



echo "Terminé !!!";