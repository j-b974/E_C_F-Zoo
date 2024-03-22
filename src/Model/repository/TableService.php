<?php

namespace App\Model\repository;

use App\Controller\entity\Service;
use \PDO;

class TableService
{
    private PDO $bdd;

    public function __construct(PDO $bdd)
    {
        $this->bdd = $bdd;

    }
    public function addService(Service $service):void
    {

        $query = "INSERT INTO service (nom , description  ) VALUES (:nom , :desc)";
        $req = $this->bdd->prepare($query);
        $req->bindValue('nom',$service->getNom() , PDO::PARAM_STR);
        $req->bindValue('desc',$service->getDescription() , PDO::PARAM_STR);

        $req->execute();

        $service->setId($this->bdd->lastInsertId());
    }
    public function UpdateServie(Service $service)
    {
        $query ="UPDATE service SET nom = :nom , description = :desc 
                      WHERE id = :id LIMIT 1";
        $req = $this->bdd->prepare($query);
        $req->bindValue('nom',$service->getNom() , PDO::PARAM_STR);
        $req->bindValue('desc',$service->getDescription() , PDO::PARAM_STR);
        $req->bindValue('id',$service->getId() , PDO::PARAM_INT);
        $req->execute();
    }
    public function delectService(Service $service)
    {
        $query = "DELETE FROM service WHERE id = :id LIMIT 1" ;
        $req = $this->bdd->prepare($query);
        $req->bindValue('id',$service->getId(), PDO::PARAM_INT);
        $req->execute();
    }

}