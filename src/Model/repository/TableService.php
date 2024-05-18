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

        $query = "INSERT INTO service (nom , description , image  ) VALUES (:nom , :desc , :image)";
        $req = $this->bdd->prepare($query);
        $req->bindValue('nom',$service->getNom() , PDO::PARAM_STR);
        $req->bindValue('desc',$service->getDescription() , PDO::PARAM_STR);
        $req->bindValue('image',$service->getImage() , PDO::PARAM_STR);

        $req->execute();

        $service->setId($this->bdd->lastInsertId());
    }
    public function UpdateService(Service $service)
    {
        $query = "UPDATE service SET nom = :nom , description = :desc , image = :image
                      WHERE id = :id LIMIT 1";
        $req = $this->bdd->prepare($query);
        $req->bindValue('nom', $service->getNom(), PDO::PARAM_STR);
        $req->bindValue('desc', $service->getDescription(), PDO::PARAM_STR);
        $req->bindValue('image', $service->getImage(), PDO::PARAM_STR);
        $req->bindValue('id', $service->getId(), PDO::PARAM_INT);
        $req->execute();
    }

    public function delectService(Service $service)
    {
        $query = "DELETE FROM service WHERE id = :id LIMIT 1" ;
        $req = $this->bdd->prepare($query);
        $req->bindValue('id',$service->getId(), PDO::PARAM_INT);
        $req->execute();
    }
    public function getAllservice():array
    {
        $query ="SELECT * FROM service";
        $req = $this->bdd->prepare($query);
        $req->setFetchMode(PDO::FETCH_CLASS , Service::class);
        $req->execute();
        return $req->fetchAll();
    }
    public function getServiceById(int $id): ?Service
    {
        $query ="SELECT * FROM service WHERE id = :id";
        $req = $this->bdd->prepare($query);
        $req->bindValue('id', $id, PDO::PARAM_INT);
        $req->setFetchMode(PDO::FETCH_CLASS , Service::class);
        $req->execute();
        $rep = $req->fetch();
        return $rep ? $rep : null ;
    }

}