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
$dataSetService = [
    ['name'=>'atelier pedagoque' , 'image'=>'atelier_pedagogique.jpg' ],
    ['name'=>'stade de barbe à papa' , 'image'=>'barbe_a_papa.jpg' ],
    ['name'=>'contact avec les serpents' , 'image'=>'contact_avec_serpents.jpg' ],
    ['name'=>'jeux de piste' , 'image'=>'jeux_de_piste.jpg' ],
    ['name'=>'visite guider dans tous le zoo' , 'image'=>'visite_guide.jpg' ]
];
for($i=0;$i<5;$i++)
{
    $service = new \App\Controller\entity\Service();
    $service->setNom($dataSetService[$i]['name']);
    $service->setDescription($faker->realText(190));
    $service->setImage($dataSetService[$i]['image']);

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
$roleAdmin = new \App\Controller\entity\Role();
$roleAdmin->setId(3)->setLabel('administrateur');
$admin = new \App\Controller\entity\Utilisateur();
$admin->setUsername('admin@admin.fr')
    ->setRole($roleAdmin)
    ->setNom('admin')
    ->setPrenom('admin')
    ->setPassword(password_hash('admin',PASSWORD_BCRYPT));
$Tutilisateur->addUtilisateur($admin);
$vetto = 3 ;
for($i=0 ; $i <= 18 ; $i++)
{
    $rand = 0 ;
    if($vetto <= 0){
        $rand = rand(0,99)<=83 ? 0 : 1;
    }else{
        $rand = 1; $vetto--;
    }
    $role = $roles[$rand];
    $utilisateur = new \App\Controller\entity\Utilisateur();
    $utilisateur->setUsername($faker->email())
        ->setPrenom($faker->firstName())
        ->setNom($faker->lastName())
        ->setPassword(password_hash(1234,PASSWORD_BCRYPT))
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
$dataSetHabitat = [
    ['nom'=>'Jungle', 'image'=>'jungle.jpg'],
    ['nom'=>'Marais', 'image'=>'marais.jpg'],
    ['nom'=>'Savane', 'image'=>'savane.jpg'],
    ['nom'=>'Terrarium', 'image'=>'terrarium.jpg'],
    ['nom'=>'Vivarium', 'image'=>'vivarium.jpg']
];
for($i=0 ; $i < 5 ; $i++)
{
    $habitat = new \App\Controller\entity\Habitat();
    $habitat->setNom($dataSetHabitat[$i]['nom'])
        ->setDescription($faker->realText(37))
        ->setImage($dataSetHabitat[$i]['image'])
        ->setCommentaireHabitat($faker->realText(195));
    $Thabitat->addHabitat($habitat);
}
// remplire la table animal
$lstHabit = $Thabitat->getAllHabitat();
$lstRace = $Trace->getAllRace();
$Tanimal = new \App\Model\repository\TableAnimal($bdd);
$dataSetAnimal = [
    'Jungle'=>'fauve',
    'Marais'=>'reptile',
    'Savane'=>'herbivore',
    'Terrarium'=>'invertebres',
    'Vivarium'=>'vivarium'
];
for($i=0;$i <= 150 ; $i++)
{
    $randHabitat = $faker->randomElements($lstHabit)[0];
    $animal = new \App\Controller\entity\Animal();
    $animal->setPrenom($faker->firstName())
        ->setEtat($faker->words(3,true))
        ->setRace($faker->randomElements($lstRace)[0])
        ->setImage($dataSetAnimal[$randHabitat->getNom()].rand(1,5).'.jpg')
        ->setHabitat($randHabitat);
    $Tanimal->addAnimal($animal);
}

// remplire la table rapport vetto
$TrapportVetto = new \App\Model\repository\TableRapportVeterinaire($bdd);
$lstAnimal = $Tanimal->getAllAnnimal();
$lstVetto =$Tutilisateur->getAllUtilisateurByRole('veterinaire');
foreach($lstAnimal as $animal)
{
    $quantite = (round((rand(100,800)/50))*50) .'gamme';
    $rapportvetto = new \App\Controller\entity\RapportVeterinaire();
    $rapportvetto->setDetailEtat($faker->paragraph(1))
        ->setVeterinaire($faker->randomElement($lstVetto))
        ->setDate($faker->dateTimeBetween('-15 years')->format('Y-m-d'))
        ->setEtat($faker->word())
        ->setNouriture($faker->words(3,true))
        ->setQuantite($quantite);

    $TrapportVetto->addRapportVeterinaire($rapportvetto , $animal->getId());
}
// remplire la table rapport employe
$TrapportEmploye = new \App\Model\repository\TableRapportEmploye($bdd);
$lstEmploy = $Tutilisateur->getAllUtilisateurByRole('employer');
foreach($lstAnimal as $animal)
{
    $quantite = rand(100,800).'g';
    $rapportEmploye = new \App\Controller\entity\RapportEmploye();
    $rapportEmploye->setNouriture($faker->words(3 , true))
        ->setEmployeId($faker->randomElement($lstEmploy))
        ->setQuantite($quantite)
        ->setDate($faker->dateTimeBetween('-15 years')->format('Y-m-d'))
        ->setHeure($faker->time());

    $TrapportEmploye->addRapportEmploye($rapportEmploye, $animal->getId());
}
echo "Terminé !!!";