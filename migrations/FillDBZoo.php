<?php
require dirname(__DIR__).'/vendor/autoload.php';

$bdd = \App\Model\DbZoo::connection();

$faker = Faker\Factory::create('fr_FR');

// remplir table Avis
$Tavis = new \App\Model\repository\TableAvis($bdd);
for($i=0;$i<= 7 ;$i++)
{
    $avis = new \App\Controller\entity\Avis();
    $avis->setPseudo($faker->firstName);
    $avis->setCommentaire($faker->realText(90));

    $Tavis->addAvis($avis);
}

// remplir table Service
$Tservice = new \App\Model\repository\TableService($bdd);
for($i=0;$i<=7;$i++)
{
    $service = new \App\Controller\entity\Service();
    $service->setNom($faker->lastName());
    $service->setDescription($faker->realText(90));

    $Tservice->addService($service);
}
// set les lable role
$Trole = new \App\Model\repository\TableRole($bdd);
$Trole->addRole('employer');
$Trole->addRole('veterinaire');
$Trole->addRole('administrateur');
$roles = [];
foreach ( $Trole->getAllRole() as $role)
{

    if($role->getLabel()!="administrateur")
    {

        $roles[] = $role;
    }
}

// remplir table Utilisateur
$Tutilisateur = new \App\Model\repository\TableUtilisateur($bdd);
for($i=0 ; $i <= 18 ; $i++)
{
    $rand = rand(0,99)<=83 ? 0 : 1;
    $role = $roles[$rand];

    $utilisateur = new \App\Controller\entity\Utilisateur();
    $utilisateur->setUsername($faker->email())
        ->setPrenom($faker->firstName())
        ->setNom($faker->lastName())
        ->setPassword('1234')
        ->setRole($role);
    $Tutilisateur->addUtilisateur($utilisateur);
}


echo "Terminé !!!";