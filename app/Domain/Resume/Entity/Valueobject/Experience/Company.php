<?php

declare(strict_types=1);

namespace App\Domain\Resume\Entity\Valueobject\Experience;

class Company implements \JsonSerializable
{
    private $name;
    private $job;
    private $entrance;
    private $leave;
    private $description;

    public function __construct()
    {
        $this->name = '';
        $this->job = '';
        $this->entrance = '';
        $this->leave = '';
        $this->description = '';
    }

    public function __toString()
    {
        return json_encode([
            'name' => $this->name,
            'job' => $this->job,
            'entrance' => $this->entrance,
            'leave' => $this->leave,
            'description' => $this->description,
        ], JSON_UNESCAPED_UNICODE);
    }

    public function jsonSerialize() {
        return $this->__toString();
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
     * Get the value of job
     */
    public function getJob()
    {
        return $this->job;
    }

    /**
     * Set the value of job
     *
     * @return  self
     */
    public function setJob($job)
    {
        $this->job = $job;

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
     * Get the value of leave
     */
    public function getLeave()
    {
        return $this->leave;
    }

    /**
     * Set the value of leave
     *
     * @return  self
     */
    public function setLeave($leave)
    {
        $this->leave = $leave;

        return $this;
    }
}