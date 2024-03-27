<?php

namespace App\Controller\entity;

class Race
{
    protected int $id;
    protected string $label;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Race
     */
    public function setId(int $id): Race
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getLabel(): string
    {
        return $this->label;
    }

    /**
     * @param string $label
     * @return Race
     */
    public function setLabel(string $label): Race
    {
        $this->label = $label;
        return $this;
    }

}