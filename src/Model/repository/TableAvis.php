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

    /**
     * @return Avis[]
     */
    public function  getAllAvisVisible(): array
    {
        $query ="SELECT id , pseudo , commentaire FROM avis WHERE  isVisible = true";
        $req = $this->bdd->prepare($query);
        $req->setFetchMode(PDO::FETCH_CLASS , Avis::class);
        $req->execute();
        return $req->fetchAll();
    }

    /**
     * @return Avis[]
     */
    public function getAllAvis(): array
    {
        $query ="SELECT id , pseudo , commentaire , isVisible FROM avis";
        $req = $this->bdd->prepare($query);
        $req->setFetchMode(PDO::FETCH_CLASS , Avis::class);
        $req->execute();
        return $req->fetchAll();
    }
    public function getAvisById(int $id):Avis
    {
        $query ="SELECT id , pseudo , commentaire , isVisible FROM avis WHERE id = :id";
        $req = $this->bdd->prepare($query);
        $req->bindValue('id',$id, PDO::PARAM_INT);
        $req->setFetchMode(PDO::FETCH_CLASS , Avis::class);
        $req->execute();
        return $req->fetch();
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