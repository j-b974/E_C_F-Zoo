<?php

namespace App\Controller\entity;

class RapportEmploye
{
    protected ?int $id =null ;
    protected ?string $nouriture = null;
    protected ?string $quantite = null;
    protected ?string $date = null;
    protected ?string $heure = null;
    protected ?Utilisateur $employe_id = null;
    protected ?Animal $animal = null ;

    /**
     * @return Animal|null
     */
    public function getAnimal(): ?Animal
    {
        return $this->animal;
    }

    /**
     * @param Animal|null $animal
     * @return RapportEmploye
     */
    public function setAnimal(?Animal $animal): RapportEmploye
    {
        $this->animal = $animal;
        return $this;
    }

    /**
     * @return int
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return RapportEmploye
     */
    public function setId(int $id): RapportEmploye
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getNouriture(): ?string
    {
        return $this->nouriture;
    }

    /**
     * @param string|null $nouriture
     * @return RapportEmploye
     */
    public function setNouriture(?string $nouriture): RapportEmploye
    {
        $this->nouriture = $nouriture;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getQuantite(): ?string
    {
        return $this->quantite;
    }

    /**
     * @param string|null $quantite
     * @return RapportEmploye
     */
    public function setQuantite(?string $quantite): RapportEmploye
    {
        $this->quantite = $quantite;
        return $this;
    }

    /**
     * @return \DateTime|null
     */
    public function getDate(): ?\DateTime
    {
        return $this->date ? new \DateTime($this->date) : new \DateTime();
    }

    /**
     * @param string|null $date
     * @return RapportEmploye
     */
    public function setDate(?string $date): RapportEmploye
    {
        $this->date = $date;
        return $this;
    }

    /**
     * @return \DateTime|null
     */
    public function getHeure(): ?\DateTime
    {
        return $this->heure ? new \DateTime($this->heure) : new \DateTime();
    }

    /**
     * @param string|null $heure
     * @return RapportEmploye
     */
    public function setHeure(?string $heure): RapportEmploye
    {
        $this->heure = $heure;
        return $this;
    }

    /**
     * @return Utilisateur|null
     */
    public function getEmployeId(): ?Utilisateur
    {
        return $this->employe_id;
    }

    /**
     * @param Utilisateur|null $employe_id
     * @return RapportEmploye
     */
    public function setEmployeId(?Utilisateur $employe_id): RapportEmploye
    {
        $this->employe_id = $employe_id;
        return $this;
    }

}