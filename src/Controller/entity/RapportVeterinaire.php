<?php

namespace App\Controller\entity;

class RapportVeterinaire
{
    protected int $id;
    protected ?string $date = null;
    protected ?string $detail_etat = null;
    protected ?Utilisateur $veterinaire = null ;
    protected ?string $nouriture = null ;
    protected  ?string $quantite = null;
    protected  ?string $etat = null;
    protected  ?Animal $animal = null;

    /**
     * @return Animal|null
     */
    public function getAnimal(): ?Animal
    {
        return $this->animal;
    }

    /**
     * @param Animal|null $animal
     * @return RapportVeterinaire
     */
    public function setAnimal(?Animal $animal): RapportVeterinaire
    {
        $this->animal = $animal;
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
     * @return RapportVeterinaire
     */
    public function setNouriture(?string $nouriture): RapportVeterinaire
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
     * @return RapportVeterinaire
     */
    public function setQuantite(?string $quantite): RapportVeterinaire
    {
        $this->quantite = $quantite;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getEtat(): ?string
    {
        return $this->etat;
    }

    /**
     * @param string|null $etat
     * @return RapportVeterinaire
     */
    public function setEtat(?string $etat): RapportVeterinaire
    {
        $this->etat = $etat;
        return $this;
    }


    /**
     * @return Utilisateur
     */
    public function getVeterinaire(): ?Utilisateur
    {
        return $this->veterinaire;
    }

    /**
     * @param Utilisateur $veterinaire
     * @return RapportVeterinaire
     */
    public function setVeterinaire(Utilisateur $veterinaire): RapportVeterinaire
    {
        $this->veterinaire = $veterinaire;
        return $this;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return RapportVeterinaire
     */
    public function setId(int $id): RapportVeterinaire
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getDate(): ?\DateTime
    {
        return $this->date ? new \DateTime($this->date) : new \DateTime();
    }

    /**
     * @param string $date
     * @return RapportVeterinaire
     */
    public function setDate(string $date): RapportVeterinaire
    {
        $this->date = $date;
        return $this;
    }

    /**
     * @return string
     */
    public function getDetailEtat(): ?string
    {
        return $this->detail_etat;
    }

    /**
     * @param string $detail
     * @return RapportVeterinaire
     */
    public function setDetailEtat(string $detail): RapportVeterinaire
    {
        $this->detail_etat = $detail;
        return $this;
    }
}