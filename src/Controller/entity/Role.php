<?php

namespace App\Controller\entity;

class Role
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
     * @return Role
     */
    public function setId(int $id): Role
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
     * @return Role
     */
    public function setLabel(string $label): Role
    {
        $this->label = $label;
        return $this;
    }

}