<?php

namespace App\Controller\entity;

class Animal
{
    protected int $id;
    protected ?string $prenom = null;
    protected ?string $etat = null;
    protected ?Race $race = null;
    protected ?Habitat $habitat = null;
    protected ?int $vue = null;

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
    public function setImage( $image): Animal
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
     * @return int|null
     */
    public function getVue(): ?int
    {
        return $this->vue;
    }

    /**
     * @param int|null $vue
     * @return Animal
     */
    public function setVue(?int $vue): Animal
    {
        $this->vue = $vue;
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
    public function getPrenom(): ?string
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
    public function getEtat(): ?string
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
    public function getRace(): ?Race
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
    public function getHabitat(): ?Habitat
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
    public function getOldImage(): ?string
    {
        return $this->oldImage;
    }
    public function isUploaded(): ?bool
    {
        return $this->uploaded;
    }

}