<?php

namespace App\Controller\entity;

class Image
{
    protected int $id;
    protected string $image;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Image
     */
    public function setId(int $id): Image
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getImage(): string
    {
        return $this->image;
    }

    /**
     * @param string $image
     * @return Image
     */
    public function setImage(string $image): Image
    {
        $this->image = $image;
        return $this;
    }

}