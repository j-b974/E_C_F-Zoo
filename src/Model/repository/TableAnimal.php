<?php

namespace App\Model\repository;

use App\Controller\entity\Animal;
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
    public function getAllAnimal():array
    {
        $query = "SELECT id ,prenom , etat FROM animal ";
        $req = $this->bdd->prepare($query);
        $req->execute();
        $req->setFetchMode(PDO::FETCH_CLASS, Animal::class);

        return $req->fetchAll();
    }
    public function addAnimal(Animal $animal):void
    {

        $query = "INSERT INTO animal (prenom , etat , race_id , habit_id ) VALUES (:prenom , :etat , :id_race , :id_habitat)";
        $req = $this->bdd->prepare($query);
        $req->bindValue('prenom',$animal->getPrenom() , PDO::PARAM_STR);
        $req->bindValue('etat',$animal->getEtat() , PDO::PARAM_STR);
        $req->bindValue('id_race',$animal->getRace()->getId() , PDO::PARAM_INT);
        $req->bindValue('id_habitat',$animal->getHabitat()->getId() , PDO::PARAM_INT);

        $req->execute();

        $animal->setId($this->bdd->lastInsertId());
    }
    public function UpdateAnimal(Animal $animal):void
    {
        $query ="UPDATE animal SET prenom = :prenom , etat = :etat , race_id = :id_race , habit_id = :id_habitat
                      WHERE id = :id LIMIT 1";
        $req = $this->bdd->prepare($query);
        $req->bindValue('prenom',$animal->getPrenom() , PDO::PARAM_STR);
        $req->bindValue('etat',$animal->getEtat(), PDO::PARAM_STR);
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
}