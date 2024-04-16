<?php

namespace App\Model\repository;

use App\Controller\entity\Animal;
use App\Controller\entity\RapportEmploye;
use App\Controller\entity\RapportVeterinaire;
use App\Controller\entity\Utilisateur;
use App\Model\DbZoo;
use \PDO;

class TableRapportEmploye
{
    private PDO $bdd;
    private $Tanimaux;
    private $Tutilisateur ;

    public function __construct(PDO $bdd)
    {
        $this->bdd = $bdd;
        $this->Tanimaux = new TableAnimal($bdd);
        $this->Tutilisateur = new TableUtilisateur($bdd);
    }

    /**
     * @param int $id
     * @return RapportEmploye[]
     */
    public function getAllRapportByEmployeId(int $id):array
    {

        $query = "SELECT id , nouriture ,quantite , date , heure FROM rapport_employe WHERE employe_id = :id ORDER BY date DESC ";
        $req = $this->bdd->prepare($query);
        $req->bindValue('id', $id, PDO::PARAM_INT);
        $req->setFetchMode(PDO::FETCH_CLASS , RapportEmploye::class);
        $req->execute();
        $lstRapport = $req->fetchAll();
        foreach ($lstRapport as $rapport)
        {
            $rapport->setAnimal($this->getAnimalOfRapport($rapport));
        }
        return $lstRapport;
    }
    public function getCompteRenduById(int $id):RapportEmploye
    {
        $query ="SELECT id , nouriture ,quantite , date , heure FROM rapport_employe WHERE id = :id";
        $req = $this->bdd->prepare($query);
        $req->bindValue('id', $id, PDO::PARAM_INT);
        $req->setFetchMode(PDO::FETCH_CLASS , RapportEmploye::class);
        $req->execute();
        $rapport = $req->fetch();
        return $rapport->setAnimal($this->getAnimalOfRapport($rapport));
    }
    /**
     * @param int $idAnimal
     * @return RapportEmploye[]
     */
    public function getAllRapportEmployeByIdAnimal(int $idAnimal):array
    {
        $query ="SELECT id_rapport_employe AS id FROM rapport_employe_animal where id_animaux = :id";
        $req = $this->bdd->prepare($query);
        $req->bindValue('id',$idAnimal , PDO::PARAM_INT );
        $req->execute();
        $lstIdRapport = $req->fetchAll();
        $lstRapport= [];
        foreach ($lstIdRapport as $idRapport)
        {
            $rapport = $this->getCompteRenduById(($idRapport['id']));

            $lstRapport[]= $rapport->setEmployeId($this->getUtilisateurOfRapport($rapport));
        }
        return $lstRapport;
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
        $query = "UPDATE rapport_employe SET nouriture = :nouriture , quantite = :quantite , date = :date , heure = :heure , employe_id = :idEmploye WHERE id = :idrap LIMIT  1";
        $req = $this->bdd->prepare($query);
        $req->bindValue('nouriture' , $RapEmploye->getNouriture() , PDO::PARAM_STR);
        $req->bindValue('quantite' , $RapEmploye->getQuantite() , PDO::PARAM_STR);
        $req->bindValue('date' , $RapEmploye->getDate()->format('Y-m-d') , PDO::PARAM_STR);
        $req->bindValue('heure' , $RapEmploye->getHeure()->format('H:i:s') , PDO::PARAM_STR);
        $req->bindValue('idEmploye' , $RapEmploye->getEmployeId()->getId() , PDO::PARAM_INT);
        $req->bindValue('idrap',$RapEmploye->getId(), PDO::PARAM_INT);

        $req->execute();

        $req = $this->bdd->prepare("DELETE FROM rapport_employe_animal WHERE id_rapport_employe = :id LIMIT 1");
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
    public function getAnimalOfRapport(RapportEmploye $rapportEmploye):Animal
    {
        $query = "SELECT id_animaux  FROM rapport_employe_animal WHERE id_rapport_employe = :idRapport
                ";
        $req = $this->bdd->prepare($query);
        $req->bindValue('idRapport', $rapportEmploye->getId() , PDO::PARAM_STR);
        $req->execute();
        return $this->Tanimaux->getAnimalById( $req->fetchColumn());
    }
    public function getUtilisateurOfRapport(RapportEmploye $rapportEmploye):Utilisateur
    {
        $query ="SELECT employe_id FROM rapport_employe WHERE id = :id";
        $req = $this->bdd->prepare($query);
        $req->bindValue('id', $rapportEmploye->getId(), PDO::PARAM_INT);
        $req->execute();
        return $this->Tutilisateur->getUtilisateurByID($req->fetchColumn());
    }
}