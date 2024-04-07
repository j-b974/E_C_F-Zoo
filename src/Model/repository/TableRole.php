<?php

namespace App\Model\repository;
use App\Controller\entity\Role;
use App\Controller\entity\Utilisateur;
use \PDO;
class TableRole
{
    private PDO $bdd;

    public function __construct(PDO $bdd)
    {
        $this->bdd = $bdd;

    }
    public function addRole( string $role)
    {
        $query = "INSERT INTO role (label) value (:role)";
        $req  = $this->bdd->prepare($query);
        $req->bindValue('role', $role, PDO::PARAM_STR);

        $req->execute();
    }

    /**
     * @param int $id
     * @return Role
     */
    public function getRoleById(int $id):Role
    {
        $query = "SELECT * FROM role WHERE id = :id";
        $req = $this->bdd->prepare($query);
        $req->bindValue("id", $id , PDO::PARAM_INT);
        $req->execute();
        $req->setFetchMode(PDO::FETCH_CLASS , Role::class);

        return $req->fetch();
    }
    public function getRoleByLabel(string $label):Role
    {
        $query = "SELECT * FROM role WHERE label= :label";
        $req = $this->bdd->prepare($query);
        $req->bindValue("label", $label , PDO::PARAM_STR);
        $req->execute();
        $req->setFetchMode(PDO::FETCH_CLASS , Role::class);

        return $req->fetch();
    }

    /**
     * @return Role[]
     */
    public function getAllRole():array
    {
        $query = "SELECT * FROM role ";
        $req = $this->bdd->prepare($query);
        $req->execute();
        $req->setFetchMode(PDO::FETCH_CLASS, Role::class);

        return $req->fetchAll();
    }
    public function addRoleUtilisateur(Utilisateur $utilisateur):void
    {
        $query = "SELECT role.id , role.label FROM role 
                    JOIN utilisateur ON  role.id = utilisateur.role_id
                    WHERE utilisateur.username = :user ";
        $req= $this->bdd->prepare($query);
        $req->bindValue('user', $utilisateur->getUsername(), PDO::PARAM_STR);
        $req->setFetchMode(PDO::FETCH_CLASS , Role::class);
        $req->execute();
        $utilisateur->setRole($req->fetch());
    }


}