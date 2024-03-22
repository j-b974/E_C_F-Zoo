<?php

namespace App\Controller\entity;

class Utilisateur
{
    protected string $username;
    protected string $password;
    protected string $nom;
    protected string $prenom;
    protected Role $role;

    /**
     * @return string
     */
    public function getUsername(): string
    {
        return $this->username;
    }

    /**
     * @param string $username
     * @return Utilisateur
     */
    public function setUsername(string $username): Utilisateur
    {
        $this->username = $username;
        return $this;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @param string $password
     * @return Utilisateur
     */
    public function setPassword(string $password): Utilisateur
    {
        $this->password = $password;
        return $this;
    }

    /**
     * @return string
     */
    public function getNom(): string
    {
        return $this->nom;
    }

    /**
     * @param string $nom
     * @return Utilisateur
     */
    public function setNom(string $nom): Utilisateur
    {
        $this->nom = $nom;
        return $this;
    }

    /**
     * @return string
     */
    public function getPrenom(): string
    {
        return $this->prenom;
    }

    /**
     * @param string $prenom
     * @return Utilisateur
     */
    public function setPrenom(string $prenom): Utilisateur
    {
        $this->prenom = $prenom;
        return $this;
    }

    /**
     * @return Role
     */
    public function getRole(): Role
    {
        return $this->role;
    }

    /**
     * @param Role $role
     * @return Utilisateur
     */
    public function setRole(Role $role): Utilisateur
    {
        $this->role = $role;
        return $this;
    }
}