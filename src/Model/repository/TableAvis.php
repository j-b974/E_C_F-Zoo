<?php

namespace App\Model\repository;

use App\Controller\entity\Avis;
use \PDO;
class TableAvis
{
    private PDO $bdd;

    public function __construct(PDO $bdd)
    {
        $this->bdd = $bdd;
    }
    public function addAvis(Avis $avis):void
    {

        $query = "INSERT INTO avis (pseudo , commentaire  ) VALUES (:pseudo , :comment)";
        $req = $this->bdd->prepare($query);
        $req->bindValue('pseudo',$avis->getPseudo() , PDO::PARAM_STR);
        $req->bindValue('comment',$avis->getCommentaire() , PDO::PARAM_STR);

        $req->execute();

        $avis->setId($this->bdd->lastInsertId());
    }
    public function UpdateAvis(Avis $avis)
    {
        $query ="UPDATE avis SET pseudo = :pseudo , commentaire = :comment , isVisible = :visible 
                      WHERE id = :id LIMIT 1";
        $req = $this->bdd->prepare($query);
        $req->bindValue('pseudo',$avis->getPseudo() , PDO::PARAM_STR);
        $req->bindValue('comment',$avis->getCommentaire() , PDO::PARAM_STR);
        $req->bindValue('visible',$avis->isVisible() , PDO::PARAM_STR);
        $req->bindValue('id',$avis->getId() , PDO::PARAM_INT);
        $req->execute();
    }
    public function delectAvis(Avis $avis)
    {
        $query = "DELETE FROM avis WHERE id = :id LIMIT 1" ;
        $req = $this->bdd->prepare($query);
        $req->bindValue('id',$avis->getId(), PDO::PARAM_INT);
        $req->execute();
    }


}