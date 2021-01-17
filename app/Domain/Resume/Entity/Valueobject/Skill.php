<?php

declare(strict_types=1);

namespace App\Domain\Resume\Entity\Valueobject;

class Skill
{

    private $name;
    private $degree;

    

    /**
     * Get the value of name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of degree
     */
    public function getDegree()
    {
        return $this->degree;
    }

    /**
     * Set the value of degree
     *
     * @return  self
     */
    public function setDegree($degree)
    {
        $this->degree = $degree;

        return $this;
    }
}