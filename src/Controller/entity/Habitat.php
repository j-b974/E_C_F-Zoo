<?php

namespace App\Controller\entity;

class Habitat
{
    protected int $id;
    protected string $nom;
    protected string $description;
    protected string $commentaire_habitat;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Habitat
     */
    public function setId(int $id): Habitat
    {
        $this->id = $id;
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
     * @return Habitat
     */
    public function setNom(string $nom): Habitat
    {
        $this->nom = $nom;
        return $this;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     * @return Habitat
     */
    public function setDescription(string $description): Habitat
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return string
     */
    public function getCommentaireHabitat(): string
    {
        return $this->commentaire_habitat;
    }

    /**
     * @param string $commentaire_habitat
     * @return Habitat
     */
    public function setCommentaireHabitat(string $commentaire_habitat): Habitat
    {
        $this->commentaire_habitat = $commentaire_habitat;
        return $this;
    }

}