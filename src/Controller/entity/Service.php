<?php

namespace App\Controller\entity;

class Service
{
    protected int $id;
    protected ?string $nom = null;
    protected ?string $description = null ;
    protected ?string $image = null;
    protected ?string $oldImage = null;
    protected ?bool $uploaded = true;

    /**
     * @return string|null
     */
    public function getImage(): ?string
    {
        return $this->image;
    }

    /**
     * @param  $image
     * @return Service
     */
    public function setImage( $image): Service
    {
        if(is_array($image) && !empty($image['tmp_name']) ){

            // pour connaitre l'image a supprimer
            if(!empty($this->image)){
                $this->oldImage = $this->image;
            }
            $this->uploaded = false;
            $this->image = $image['tmp_name'];
        }
        if(is_string($image) && !empty($image)){
            $this->image = $image;
        }

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
    public function getNom(): ?string
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
    public function getDescription(): ?string
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
    public function getOldImage(): ?string
    {
        return $this->oldImage;
    }
    public function isUploaded(): ?bool
    {
        return $this->uploaded;
    }
}