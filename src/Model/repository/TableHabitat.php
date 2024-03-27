<?php

namespace App\Model\repository;

use App\Controller\entity\Habitat;
use \PDO;
class TableHabitat
{
    private PDO $bdd;

    public function __construct(PDO $bdd)
    {
        $this->bdd = $bdd;

    }

    /**
     * @return array<Habitat>
     */
    public function getAllHabitat():array
    {
        $query = "SELECT * FROM habitat ";
        $req = $this->bdd->prepare($query);
        $req->execute();
        $req->setFetchMode(PDO::FETCH_CLASS, Habitat::class);

        return $req->fetchAll();

    }
    public function addHabit(Habitat $habitat):void
    {
        $query = "INSERT INTO habitat ( nom , description, commentaire_habitat ) VALUES (:nom , :desc , :com)";
        $req = $this->bdd->prepare($query);
        $req->bindValue('nom',$habitat->getNom() , PDO::PARAM_STR);
        $req->bindValue('desc',$habitat->getDescription() , PDO::PARAM_STR);
        $req->bindValue('com',$habitat->getCommentaireHabitat() , PDO::PARAM_STR);

        $req->execute();

        $habitat->setId($this->bdd->lastInsertId());
    }
    public function UpdateHabitat(Habitat $habitat):void
    {
        $query ="UPDATE habitat SET nom= :nom , description= :desc , commentaire_habitat = :com 
                      WHERE id = :id LIMIT 1";
        $req = $this->bdd->prepare($query);
        $req->bindValue('nom',$habitat->getNom() , PDO::PARAM_STR);
        $req->bindValue('desc',$habitat->getDescription() , PDO::PARAM_STR);
        $req->bindValue('com',$habitat->getCommentaireHabitat() , PDO::PARAM_STR);
        $req->bindValue('id',$habitat->getId() , PDO::PARAM_INT);
        $req->execute();
    }
    public function delectHabitat(Habitat $habitat)
    {
        $query = "DELETE FROM habitat WHERE id = :id LIMIT 1" ;
        $req = $this->bdd->prepare($query);
        $req->bindValue('id',$habitat->getId(), PDO::PARAM_INT);
        $req->execute();
    }


}