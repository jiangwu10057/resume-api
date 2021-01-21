<?php

declare(strict_types=1);

namespace App\Domain\Resume\Entity\Valueobject;

class Personal
{
    private $name;
    private $sex;
    private $year;
    private $education;

    public function __construct()
    {
        $this->name = '';
        $this->sex = Sex::MALE;
        $this->year = '';
        $this->education = '';
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
     * Get the value of sex
     */
    public function getSex()
    {
        return $this->sex;
    }

    /**
     * Set the value of sex
     *
     * @return  self
     */
    public function setSex($sex)
    {
        $this->sex = $sex;

        return $this;
    }

    /**
     * Get the value of year
     */
    public function getYear()
    {
        return $this->year;
    }

    /**
     * Set the value of year
     *
     * @return  self
     */
    public function setYear($year)
    {
        $this->year = $year;

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

    public function toString()
    {
        return json_encode([
            'name' => $this->name,
            'sex' => $this->sex,
            'year' => $this->year,
            'education' => $this->education
        ], JSON_UNESCAPED_UNICODE);
    }
}