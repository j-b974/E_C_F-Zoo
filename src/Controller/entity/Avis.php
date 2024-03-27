<?php

namespace App\Controller\entity;

class Avis
{
    protected int $id;
    protected string $pseudo;
    protected string $commentaire;
    protected bool $isVisible;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Avis
     */
    public function setId(int $id): Avis
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getPseudo(): string
    {
        return $this->pseudo;
    }

    /**
     * @param string $pseudo
     * @return Avis
     */
    public function setPseudo(string $pseudo): Avis
    {
        $this->pseudo = $pseudo;
        return $this;
    }

    /**
     * @return string
     */
    public function getCommentaire(): string
    {
        return $this->commentaire;
    }

    /**
     * @param string $commentaire
     * @return Avis
     */
    public function setCommentaire(string $commentaire): Avis
    {
        $this->commentaire = $commentaire;
        return $this;
    }

    /**
     * @return bool
     */
    public function isVisible(): bool
    {
        return $this->isVisible;
    }

    /**
     * @param bool $isVisible
     * @return Avis
     */
    public function setIsVisible(bool $isVisible): Avis
    {
        $this->isVisible = $isVisible;
        return $this;
    }
}