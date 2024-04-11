<?php

namespace App\Model\repository;

use App\Controller\entity\RapportEmploye;
use \PDO;

class TableRapportEmploye
{
    private PDO $bdd;

    public function __construct(PDO $bdd)
    {
        $this->bdd = $bdd;


    }

    public function addRapportEmploye(RapportEmploye $RapEmploye , int $idAnimaux)
    {
        $query = "INSERT INTO rapport_employe (nouriture , quantite , date , heure , employe_id ) VALUES (:nouriture , :quantite , :date ,:heure , :idEmploye )";
        $req = $this->bdd->prepare($query);
        $req->bindValue('nouriture' , $RapEmploye->getNouriture() , PDO::PARAM_STR);
        $req->bindValue('quantite' , $RapEmploye->getQuantite() , PDO::PARAM_STR);
        $req->bindValue('date' , $RapEmploye->getDate()->format('Y-m-d') , PDO::PARAM_STR);
        $req->bindValue('heure' , $RapEmploye->getHeure()->format('H:i:s') , PDO::PARAM_STR);
        $req->bindValue('idEmploye' , $RapEmploye->getEmployeId()->getId() , PDO::PARAM_INT);

        $req->execute();
        $RapEmploye->setId((int) $this->bdd->lastInsertId());
        $this->insertAnimal($RapEmploye->getId() , $idAnimaux);
    }
    public function updateRapportEmploye(RapportEmploye $RapEmploye , int $idAnimaux)
    {
        $query = "UPDATE rapport_employe SET nouriture = :nouriture , quantite = :quantite , date = :date , heure = :heure , employe_id = :idEmploye WHERE id = :idrap";
        $req = $this->bdd->prepare($query);
        $req->bindValue('nouriture' , $RapEmploye->getNouriture() , PDO::PARAM_STR);
        $req->bindValue('quantite' , $RapEmploye->getQuantite() , PDO::PARAM_STR);
        $req->bindValue('date' , $RapEmploye->getDate()->format('Y-m-d') , PDO::PARAM_STR);
        $req->bindValue('heure' , $RapEmploye->getHeure()->format('H:i:s') , PDO::PARAM_STR);
        $req->bindValue('idEmploye' , $RapEmploye->getEmployeId()->getId() , PDO::PARAM_INT);
        $req->bindValue('idrap',$RapEmploye->getId(), PDO::PARAM_INT);

        $req->execute();

        $req = $this->bdd->prepare("DELETE FROM rapport_veterinaire_annimaux WHERE id_rapport = :idrap LIMIT 1");
        $req->execute(['id'=> $RapEmploye->getId()]);
        $this->insertAnimal($RapEmploye->getId(), $idAnimaux);

    }
    public function deleteRapportEmploy(RapportEmploye $RapEmploye)
    {
        $query ="DELETE FROM rapport_employe WHERE id = :idrap LIMIT 1";
        $req = $this->bdd->prepare($query);
        $req->bindValue('idrap',$RapEmploye->getId(), PDO::PARAM_INT);
        $req->execute();
    }

    private function insertAnimal(int $IdEmploye , int $idAnimaux)
    {
        $query ="INSERT INTO rapport_employe_animal SET id_rapport_employe = :r_id , id_animaux = :ani_id";
        $req = $this->bdd->prepare($query);
        $req->execute(['r_id'=>$IdEmploye ,'ani_id'=>$idAnimaux]);
    }
}