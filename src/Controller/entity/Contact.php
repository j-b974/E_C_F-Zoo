<?php

namespace App\Controller\entity;

class Contact
{
    private ?int $id = null;
    private ?string $address_email  = null;
    private ?string $titre = null;
    private ?string $description = null;

    /**
     * @return string|null
     */
    public function getTitre(): ?string
    {
        return $this->titre;
    }

    /**
     * @param string|null $titre
     * @return Contact
     */
    public function setTitre(?string $titre): Contact
    {
        $this->titre = $titre;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int|null $id
     * @return Contact
     */
    public function setId(?int $id): Contact
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getAddressEmail(): ?string
    {
        return $this->address_email;
    }

    /**
     * @param string|null $address_email
     * @return Contact
     */
    public function setAddressEmail(?string $address_email): Contact
    {
        $this->address_email = $address_email;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @param string|null $description
     * @return Contact
     */
    public function setDescription(?string $description): Contact
    {
        $this->description = $description;
        return $this;
    }

}