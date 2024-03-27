<?php

namespace App\Model\repository;

use App\Controller\entity\Utilisateur;
use App\Controller\entity\Role;
use App\Controller\services\SetterObjet;
use \PDO;

class TableUtilisateur
{
    private PDO $bdd;

    public function __construct(PDO $bdd)
    {
        $this->bdd = $bdd;
    }

    /**
     * @return array<Utilisateur>
     */
    public function getAllVeterinaire():array
    {
        $query = "SELECT utilisateur.* , role.* FROM utilisateur 
                  left join role ON role.id = utilisateur.role_id
                  WHERE role.label = 'veterinaire' ";
        $req = $this->bdd->prepare($query);
        $req->execute();
        $req->setFetchMode(PDO::FETCH_ASSOC );
        $datas = $req->fetchAll();

        $datasFromat=[];
        foreach($datas as $donnee)
        {
            $utilisateur = SetterObjet::hydrate(new Utilisateur(),$donnee,array_keys($donnee) ) ;
            $datasFromat[] = $utilisateur->setRole(SetterObjet::hydrate(new Role , $donnee , array_keys($donnee)));
        }

        return $datasFromat ;
    }
    public function addUtilisateur(Utilisateur $utilisateur):void
    {

        $query = "INSERT INTO utilisateur (username , password , nom , prenom , role_id) VALUES (:user , :pass , :nom , :prenom , :role)";
        $req = $this->bdd->prepare($query);
        $req->bindValue('user',$utilisateur->getUsername() , PDO::PARAM_STR);
        $req->bindValue('pass',$utilisateur->getPassword() , PDO::PARAM_STR);
        $req->bindValue('nom',$utilisateur->getNom() , PDO::PARAM_STR);
        $req->bindValue('prenom',$utilisateur->getPrenom() , PDO::PARAM_STR);
        $req->bindValue('role', $utilisateur->getRole()->getId(), PDO::PARAM_INT);

        $req->execute();
    }
    public function UpdateUtilisateur(Utilisateur $utilisateur)
    {
        $query ="UPDATE utilisateur SET  password = :pass , nom = :nom , prenom = :prenom , role_id  = :role
                      WHERE username = :user LIMIT 1";
        $req = $this->bdd->prepare($query);
        $req->bindValue('pass',$utilisateur->getPassword(), PDO::PARAM_STR);
        $req->bindValue('nom',$utilisateur->getNom(), PDO::PARAM_STR);
        $req->bindValue('prenom',$utilisateur->getPrenom() , PDO::PARAM_STR);
        $req->bindValue('role',$utilisateur->getRole()->getId() , PDO::PARAM_INT);
        $req->bindValue('user',$utilisateur->getUsername() , PDO::PARAM_STR);

        $req->execute();
    }
    public function delectUtilisateur(Utilisateur $utilisateur)
    {
        $query = "DELETE FROM utilisateur WHERE username = :user LIMIT 1" ;
        $req = $this->bdd->prepare($query);
        $req->bindValue('user',$utilisateur->getUsername(), PDO::PARAM_STR);
        $req->execute();
    }

}