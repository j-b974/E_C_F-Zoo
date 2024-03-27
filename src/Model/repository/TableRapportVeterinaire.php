<?php

namespace App\Model\repository;

use App\Controller\entity\RapportVeterinaire;
use \PDO;
class TableRapportVeterinaire
{
    private PDO $bdd;

    public function __construct(PDO $bdd)
    {
        $this->bdd = $bdd;

    }
    public function addRapportVeterinaire(RapportVeterinaire $rapportVeto):void
    {

        $query = "INSERT INTO rapport_veterinaire ( detail , veterinaire , aniaml_id ) VALUES (:detail , :veto , :id_animal)";
        $req = $this->bdd->prepare($query);
        $req->bindValue('detail',$rapportVeto->getDetail() , PDO::PARAM_STR);
        $req->bindValue('veto',$rapportVeto->getVeterinaire()->getUsername() , PDO::PARAM_STR);
        $req->bindValue('id_animal',$rapportVeto->getAnimal()->getId() , PDO::PARAM_INT);

        $req->execute();

        $rapportVeto->setId($this->bdd->lastInsertId());
    }
    public function UpdateRapportVeterinaire(RapportVeterinaire $rapportVeto):void
    {
        $query ="UPDATE rapport_veterinaire SET create_date = :date , detail = :detail , veterinaire = :veto , aniaml_id = :id_animal 
                      WHERE id = :id LIMIT 1";
        $req = $this->bdd->prepare($query);
        $req->bindValue('detail',$rapportVeto->getDetail() , PDO::PARAM_STR);
        $req->bindValue('veto',$rapportVeto->getVeterinaire()->getUsername() , PDO::PARAM_STR);
        $req->bindValue('id_animal',$rapportVeto->getAnimal()->getId() , PDO::PARAM_INT);
        $req->bindValue('date',$rapportVeto->getCreateDate()->format('Y-m-d') , PDO::PARAM_STR);
        $req->bindValue('id',$rapportVeto->getId() , PDO::PARAM_INT);
        $req->execute();
    }
    public function delectRapportVeterinaire(RapportVeterinaire $rapportVeto)
    {
        $query = "DELETE FROM rapport_veterinaire WHERE id = :id LIMIT 1" ;
        $req = $this->bdd->prepare($query);
        $req->bindValue('id',$rapportVeto->getId(), PDO::PARAM_INT);
        $req->execute();
    }

}