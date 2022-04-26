<?php

declare(strict_types=1);

namespace App\Domain\Resume\Entity\Valueobject\Experience;

class Company implements \JsonSerializable
{
    private $company;
    private $position;
    private $timeperiod;
    private $projects;

    public function __construct()
    {
        $this->company = '';
        $this->position = '';
        $this->timeperiod = '';
        $this->projects = [];
    }

    /**
     * Get the value of company
     */
    public function getCompany()
    {
        return $this->company;
    }

    /**
     * Set the value of company
     *
     * @return  self
     */
    public function setCompany($company)
    {
        $this->company = $company;

        return $this;
    }

    /**
     * Get the value of position
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * Set the value of position
     *
     * @return  self
     */
    public function setPosition($position)
    {
        $this->position = $position;

        return $this;
    }

    /**
     * Get the value of timeperiod
     */
    public function getTimeperiod()
    {
        return $this->timeperiod;
    }

    /**
     * Set the value of timeperiod
     *
     * @return  self
     */
    public function setTimeperiod($timeperiod)
    {
        $this->timeperiod = $timeperiod;

        return $this;
    }

    /**
     * Get the value of projects
     */
    public function getProjects()
    {
        return $this->projects;
    }

    /**
     * Set the value of projects
     *
     * @return  self
     */
    public function setProjects($projects)
    {
        $this->projects = $projects;

        return $this;
    }

    public function __toString()
    {
        return json_encode([
            'company' => $this->company,
            'position' => $this->position,
            'timeperiod' => $this->timeperiod,
            'projects' => $this->projects,
        ], JSON_UNESCAPED_UNICODE);
    }

    public function jsonSerialize() {
        return $this->__toString();
    }
}