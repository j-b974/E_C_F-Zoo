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

// remplir table race
$Trace = new \App\Model\repository\TableRace($bdd);
for($i=0; $i<= 47 ; $i++)
{
    $race = new \App\Controller\entity\Race();
    $race->setLabel($faker->word());

    $Trace->addRace($race);
}

// remplir table habitat
$Thabitat = new \App\Model\repository\TableHabitat($bdd);
for($i=0 ; $i <= 7 ; $i++)
{
    $habitat = new \App\Controller\entity\Habitat();
    $habitat->setNom($faker->lastName())
        ->setDescription($faker->paragraph(1))
        ->setCommentaireHabitat($faker->realText(75));
    $Thabitat->addHabit($habitat);
}

// remplire la table animal
$lstHabit = $Thabitat->getAllHabitat();
$lstRace = $Trace->getAllRace();
$Tanimal = new \App\Model\repository\TableAnimal($bdd);

for($i=0;$i <= 150 ; $i++)
{

    $animal = new \App\Controller\entity\Animal();
    $animal->setPrenom($faker->firstName())
        ->setEtat($faker->words(3,true))
        ->setRace($faker->randomElements($lstRace)[0])
        ->setHabitat($faker->randomElements($lstHabit)[0]);

    $Tanimal->addAnimal($animal);
}

echo "Terminé !!!";