<?php

declare(strict_types=1);

namespace App\Domain\Resume\Entity\Valueobject\Experience;

class School
{
    private $name;
    private $education;
    private $entrance;
    private $graduation;
    private $description;

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
     * Get the value of education
     */
    public function getEducation()
    {
        return $this->education;
    }

    /**
     * Set the value of education
     *
     * @return  self
     */
    public function setEducation($education)
    {
        $this->education = $education;

        return $this;
    }

    /**
     * Get the value of entrance
     */
    public function getEntrance()
    {
        return $this->entrance;
    }

    /**
     * Set the value of entrance
     *
     * @return  self
     */
    public function setEntrance($entrance)
    {
        $this->entrance = $entrance;

        return $this;
    }

    /**
     * Get the value of graduation
     */
    public function getGraduation()
    {
        return $this->graduation;
    }

    /**
     * Set the value of graduation
     *
     * @return  self
     */
    public function setGraduation($graduation)
    {
        $this->graduation = $graduation;

        return $this;
    }

    /**
     * Get the value of description
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set the value of description
     *
     * @return  self
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    public function toString()
    {
        return json_encode([
            'name' => $this->name,
            'education' => $this->education,
            'entrance' => $this->entrance,
            'graduation' => $this->graduation,
            'description' => $this->description
        ], JSON_UNESCAPED_UNICODE);
    }
}