<?php

namespace App\Controller\entity;

class Habitat
{
    protected int $id;
    protected ?string $nom = null;
    protected ?string $description = null;
    protected ?string $commentaire_habitat =null;

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
    public function setImage( $image): Habitat
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
    public function getNom(): ?string
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
    public function getDescription(): ?string
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
    public function getCommentaireHabitat(): ?string
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
    public function getOldImage(): ?string
    {
        return $this->oldImage;
    }
    public function isUploaded(): ?bool
    {
        return $this->uploaded;
    }

}