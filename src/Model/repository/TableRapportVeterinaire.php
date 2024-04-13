<?php

namespace App\Model\repository;

use App\Controller\entity\Animal;
use App\Controller\entity\RapportVeterinaire;
use \PDO;
class TableRapportVeterinaire
{
    private PDO $bdd;
    private $Tanimaux ;

    public function __construct(PDO $bdd)
    {
        $this->bdd = $bdd;
        $this->Tanimaux = new TableAnimal($bdd);

    }

    /**
     * @param int $idVeterinaire
     * @return RapportVeterinaire[]
     */
    public function getCompteRendusVeteriniareById(int $idVeterinaire):array
    {
        $query = "SELECT id , date , nouriture , quantite ,etat ,detail_etat FROM rapport_veterinaire WHERE veterinaire_id = :idVetto ORDER BY date DESC ";
        $req = $this->bdd->prepare($query);
        $req->bindValue('idVetto', $idVeterinaire , PDO::PARAM_INT);
        $req->execute();
        $req->setFetchMode(PDO::FETCH_CLASS , RapportVeterinaire::class);
        $lstRapport = $req->fetchAll();
        foreach($lstRapport as $rapport)
        {
            $rapport->setAnimal($this->getAnimalOfRapport($rapport));
        }
        return $lstRapport;
    }
    public function getCompteRenduById(int $idRapport):RapportVeterinaire
    {
        $query ="SELECT id , date , nouriture , quantite ,etat ,detail_etat FROM rapport_veterinaire WHERE id = :id";
        $req = $this->bdd->prepare($query);
        $req->bindValue('id', $idRapport , PDO::PARAM_INT);
        $req->setFetchMode(PDO::FETCH_CLASS , RapportVeterinaire::class);
        $req->execute();
        $rapport = $req->fetch();
        return $rapport->setAnimal($this->getAnimalOfRapport($rapport));
    }
    public function addRapportVeterinaire(RapportVeterinaire $rapportVeto , int $anialId):void
    {

        $query = "INSERT INTO rapport_veterinaire (date , nouriture ,quantite , etat,  detail_etat , veterinaire_id   ) VALUES (:date , :nouriture , :quantite , :etat , :detail , :vetto )";
        $req = $this->bdd->prepare($query);
        $req->bindValue('date',$rapportVeto->getDate()->format('Y-m-d'), PDO::PARAM_STR);
        $req->bindValue('nouriture', $rapportVeto->getNouriture(),PDO::PARAM_STR);
        $req->bindValue('quantite',$rapportVeto->getQuantite(), PDO::PARAM_STR);
        $req->bindValue('etat', $rapportVeto->getEtat(), PDO::PARAM_STR);
        $req->bindValue('detail',$rapportVeto->getDetailEtat() , PDO::PARAM_STR);
        $req->bindValue('vetto',$rapportVeto->getVeterinaire()->getId() , PDO::PARAM_INT);

        $req->execute();
        $rapportVeto->setId((int) $this->bdd->lastInsertId());
        $this->insertAnimal($rapportVeto->getId(), $anialId);
    }
    public function UpdateRapportVeterinaire(RapportVeterinaire $rapportVeto , int $animalId):void
    {
        $query ="UPDATE rapport_veterinaire SET date = :date , detail_etat = :detail , veterinaire_id = :veto , nouriture = :nouriture , quantite = :quantite , etat= :etat
                      WHERE id = :id LIMIT 1";
        $req = $this->bdd->prepare($query);
        $req->bindValue('detail',$rapportVeto->getDetailEtat() , PDO::PARAM_STR);
        $req->bindValue('veto',$rapportVeto->getVeterinaire()->getId() , PDO::PARAM_INT);
        $req->bindValue('date',$rapportVeto->getDate()->format('Y-m-d') , PDO::PARAM_STR);
        $req->bindValue('nouriture',$rapportVeto->getNouriture() , PDO::PARAM_STR);
        $req->bindValue('quantite',$rapportVeto->getQuantite() , PDO::PARAM_STR);
        $req->bindValue('etat',$rapportVeto->getEtat(), PDO::PARAM_STR);
        $req->bindValue('id',$rapportVeto->getId() , PDO::PARAM_INT);

        $req->execute();

        $req = $this->bdd->prepare("DELETE FROM rapport_veterinaire_annimaux WHERE id_rapport = :id LIMIT 1");
        $req->execute(['id'=> $rapportVeto->getId()]);
        $this->insertAnimal($rapportVeto->getId(), $animalId);

    }
    public function delectRapportVeterinaire(RapportVeterinaire $rapportVeto)
    {
        $query = "DELETE FROM rapport_veterinaire WHERE id = :id LIMIT 1" ;
        $req = $this->bdd->prepare($query);
        $req->bindValue('id',$rapportVeto->getId(), PDO::PARAM_INT);
        $req->execute();
    }
    private function insertAnimal(int $idRapport , int $idAnimal)
    {
        $query ="INSERT INTO rapport_veterinaire_annimaux SET id_rapport = :r_id , id_animaux = :ani_id";
        $req = $this->bdd->prepare($query);
        $req->execute(['r_id'=> $idRapport ,'ani_id'=>$idAnimal]);
    }
    public function getAnimalOfRapport(RapportVeterinaire $rapportVeterinaire):Animal
    {
        $query = "SELECT id_animaux  FROM rapport_veterinaire_annimaux WHERE id_rapport = :idRapport
                ";
        $req = $this->bdd->prepare($query);
        $req->bindValue('idRapport', $rapportVeterinaire->getId() , PDO::PARAM_STR);
        $req->execute();
       return $this->Tanimaux->getAnimalById( $req->fetchColumn());
    }

}