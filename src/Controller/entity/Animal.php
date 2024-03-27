<?php

namespace App\Controller\entity;

class Animal
{
    protected int $id;
    protected string $prenom;
    protected string $etat;
    protected Race $race;
    protected Habitat $habitat;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Animal
     */
    public function setId(int $id): Animal
    {
        $this->id = $id;
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
     * @return Animal
     */
    public function setPrenom(string $prenom): Animal
    {
        $this->prenom = $prenom;
        return $this;
    }

    /**
     * @return string
     */
    public function getEtat(): string
    {
        return $this->etat;
    }

    /**
     * @param string $etat
     * @return Animal
     */
    public function setEtat(string $etat): Animal
    {
        $this->etat = $etat;
        return $this;
    }

    /**
     * @return Race
     */
    public function getRace(): Race
    {
        return $this->race;
    }

    /**
     * @param Race $race
     * @return Animal
     */
    public function setRace(Race $race): Animal
    {
        $this->race = $race;
        return $this;
    }

    /**
     * @return Habitat
     */
    public function getHabitat(): Habitat
    {
        return $this->habitat;
    }

    /**
     * @param Habitat $habitat
     * @return Animal
     */
    public function setHabitat(Habitat $habitat): Animal
    {
        $this->habitat = $habitat;
        return $this;
    }

}