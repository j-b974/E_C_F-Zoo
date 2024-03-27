<?php

namespace App\Controller\entity;

class RapportVeterinaire
{
    protected int $id;
    protected string $create_date;
    protected string $detail;
    protected Utilisateur $veterinaire;
    protected Animal $animal;

    /**
     * @return Utilisateur
     */
    public function getVeterinaire(): Utilisateur
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
     * @return Animal
     */
    public function getAnimal(): Animal
    {
        return $this->animal;
    }

    /**
     * @param Animal $animal
     * @return RapportVeterinaire
     */
    public function setAnimal(Animal $animal): RapportVeterinaire
    {
        $this->animal = $animal;
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
    public function getCreateDate(): \DateTime
    {
        return new \DateTime($this->create_date);
    }

    /**
     * @param string $date
     * @return RapportVeterinaire
     */
    public function setCreateDate(string $date): RapportVeterinaire
    {
        $this->create_date = $date;
        return $this;
    }

    /**
     * @return string
     */
    public function getDetail(): string
    {
        return $this->detail;
    }

    /**
     * @param string $detail
     * @return RapportVeterinaire
     */
    public function setDetail(string $detail): RapportVeterinaire
    {
        $this->detail = $detail;
        return $this;
    }
}