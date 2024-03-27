<?php

namespace App\Model\repository;

use App\Controller\entity\Race;
use \PDO;
class TableRace
{
    private PDO $bdd;

    public function __construct(PDO $bdd)
    {
        $this->bdd = $bdd;
    }

    /**
     * @return array<Race>
     */
    public function getAllRace():array
    {
        $query = "SELECT * FROM race ";
        $req = $this->bdd->prepare($query);
        $req->execute();
        $req->setFetchMode(PDO::FETCH_CLASS, Race::class);

        return $req->fetchAll();
    }
    public function addRace(Race $race):void
    {
        $query = "INSERT INTO race (label ) VALUES (:label)";
        $req = $this->bdd->prepare($query);
        $req->bindValue('label',$race->getLabel() , PDO::PARAM_STR);

        $req->execute();

        $race->setId($this->bdd->lastInsertId());
    }
    public function UpdateRace(Race $race):void
    {
        $query ="UPDATE race SET label = :label WHERE id = :id LIMIT 1";
        $req = $this->bdd->prepare($query);
        $req->bindValue('label',$race->getLabel() , PDO::PARAM_STR);
        $req->bindValue('id',$race->getId() , PDO::PARAM_INT);
        $req->execute();
    }
    public function delectRace(Race $race):void
    {
        $query = "DELETE FROM race WHERE id = :id LIMIT 1" ;
        $req = $this->bdd->prepare($query);
        $req->bindValue('id',$race->getId(), PDO::PARAM_INT);
        $req->execute();
    }
}