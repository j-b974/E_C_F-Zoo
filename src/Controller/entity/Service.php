<?php

namespace App\Controller\entity;

class Service
{
    protected int $id;
    protected string $nom;
    protected string $description ;
    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Service
     */
    public function setId(int $id): Service
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
     * @return Service
     */
    public function setNom(string $nom): Service
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
     * @return Service
     */
    public function setDescription(string $description): Service
    {
        $this->description = $description;
        return $this;
    }
}