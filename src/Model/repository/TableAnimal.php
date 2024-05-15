<?php

namespace App\Model\repository;

use App\Controller\entity\Animal;
use App\Controller\entity\Habitat;
use App\Controller\entity\Race;
use App\Controller\entity\RapportEmploye;
use App\Controller\services\SetterObjet;
use \PDO;

class TableAnimal
{
    private PDO $bdd;

    public function __construct(PDO $bdd)
    {
        $this->bdd = $bdd;

    }

    /**
     * @return array<Animal>
     */
    public function getAllAnnimal():array
    {
        $query = "SELECT animal.id ,animal.prenom , animal.etat , animal.image,
                    race.id AS race_id , race.label ,
                    habitat.id AS habitat_id , habitat.nom , habitat.description , habitat.commentaire_habitat
                    FROM animal 
                    join race on race.id = animal.race_id 
                    join habitat on habitat.id = animal.habit_id";
        $req = $this->bdd->prepare($query);
        $req->execute();
        $req->setFetchMode(PDO::FETCH_ASSOC);
        return $this->dataFormatObjet($req->fetchAll());
    }

    /**
     * @param int $HabitatId
     * @return Aniaml[]
     */
    public function getAllAnimalByHabitatId(int $HabitatId):array
    {
        $query = "SELECT id , prenom , image FROM animal WHERE habit_id = :id";
        $req = $this->bdd->prepare($query);
        $req->bindValue('id', $HabitatId , PDO::PARAM_INT);
        $req->setFetchMode(PDO::FETCH_CLASS , Animal::class);
        $req->execute();
        return $req->fetchAll();
    }
    public function getAnimalById(int $id):Animal
    {
        $query ="SELECT animal.id, animal.prenom , animal.etat , animal.image ,
                race.id AS race_id, race.label ,
                habitat.id AS habitat_id , habitat.nom , habitat.description , habitat.commentaire_habitat
                FROM animal 
                JOIN race ON race.id = animal.race_id
                JOIN habitat ON  habitat.id = animal.habit_id
                WHERE animal.id = $id";
        $req = $this->bdd->prepare($query);
        $req->execute();
        return $this->dataFormatObjet($req->fetchAll(PDO::FETCH_ASSOC))[0];

    }
    public function addAnimal(Animal $animal):void
    {

        $query = "INSERT INTO animal (prenom , etat , race_id , habit_id , image) VALUES (:prenom , :etat , :id_race , :id_habitat , :image)";
        $req = $this->bdd->prepare($query);
        $req->bindValue('prenom',$animal->getPrenom() , PDO::PARAM_STR);
        $req->bindValue('etat',$animal->getEtat() , PDO::PARAM_STR);
        $req->bindValue('image',$animal->getImage(), PDO::PARAM_STR);
        $req->bindValue('id_race',$animal->getRace()->getId() , PDO::PARAM_INT);
        $req->bindValue('id_habitat',$animal->getHabitat()->getId() , PDO::PARAM_INT);

        $req->execute();

        $animal->setId($this->bdd->lastInsertId());
    }
    public function UpdateAnimal(Animal $animal):void
    {
        $query ="UPDATE animal SET prenom = :prenom , etat = :etat , race_id = :id_race , habit_id = :id_habitat, image = :image
                      WHERE id = :id LIMIT 1";
        $req = $this->bdd->prepare($query);
        $req->bindValue('prenom',$animal->getPrenom() , PDO::PARAM_STR);
        $req->bindValue('etat',$animal->getEtat(), PDO::PARAM_STR);
        $req->bindValue('image',$animal->getImage(), PDO::PARAM_STR);
        $req->bindValue('id_race',$animal->getRace()->getId() , PDO::PARAM_INT);
        $req->bindValue('id_habitat',$animal->getHabitat()->getId() , PDO::PARAM_INT);
        $req->bindValue('id',$animal->getId() , PDO::PARAM_INT);
        $req->execute();
    }
    public function delectAnimal(Animal $animal):void
    {
        $query = "DELETE FROM animal WHERE id = :id LIMIT 1" ;
        $req = $this->bdd->prepare($query);
        $req->bindValue('id',$animal->getId(), PDO::PARAM_INT);
        $req->execute();
    }
    private function dataFormatObjet( array $data):array
    {
        $dataFromat= [];
        foreach($data as $donnee)
        {
            $animal = SetterObjet::hydrate(new Animal(),$donnee,array_keys($donnee) ) ;

            $race = SetterObjet::hydrate(new Race(),$donnee,array_keys($donnee));
            $race->setId($donnee['race_id']);

            $habitat = SetterObjet::hydrate(new Habitat(),$donnee,array_keys($donnee));
            $habitat->setId($donnee['habitat_id']);

            $dataFromat[] = $animal->setRace($race)->setHabitat($habitat);
        }
        return $dataFromat;
    }
}