<?php

declare(strict_types=1);

namespace App\Domain\Resume\Entity\Valueobject;

class Except implements \JsonSerializable
{
    private $position;
    private $salary;
    private $city;

    public function __construct()
    {
        $this->position = '';
        $this->salary = '';
        $this->city = '';
    }
    
    

    public function __toString()
    {
        return json_encode([
            'position' => $this->position,
            'salary' => $this->salary,
            'city' => $this->city
        ], JSON_UNESCAPED_UNICODE);
    }

    public function jsonSerialize() {
        return $this->__toString();
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
     * Get the value of salary
     */
    public function getSalary()
    {
        return $this->salary;
    }

    /**
     * Set the value of salary
     *
     * @return  self
     */
    public function setSalary($salary)
    {
        $this->salary = $salary;

        return $this;
    }

    /**
     * Get the value of city
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set the value of city
     *
     * @return  self
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }
}