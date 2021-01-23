<?php

declare(strict_types=1);

namespace App\Domain\Resume\Entity;

use App\Domain\Resume\Entity\Valueobject\Contact;
use App\Domain\Resume\Entity\Valueobject\Personal;

class Content
{
    private $id = 0;
    private $uid;

    private $title;
    private $target;
    
    private $contact;
    private $personal;
    private $workExperience;
    private $education;
    private $works;
    private $skills;

    public function __construct()
    {
        $this->uid = 0;

        $this->title = '';
        $this->target = '';

        $this->contact = new Contact();
        $this->personal = new Personal();
        $this->workExperience = [];
        $this->education = [];
        $this->works = [];
        $this->skills = [];
    }

    /**
     * Get the value of contact
     */
    public function getContact()
    {
        return $this->contact;
    }

    /**
     * Set the value of contact
     *
     * @return  self
     */
    public function setContact($contact)
    {
        $this->contact = $contact;

        return $this;
    }

    /**
     * Get the value of personal
     */
    public function getPersonal()
    {
        return $this->personal;
    }

    /**
     * Set the value of personal
     *
     * @return  self
     */
    public function setPersonal($personal)
    {
        $this->personal = $personal;

        return $this;
    }

    /**
     * Get the value of workExperience
     */
    public function getWorkExperience()
    {
        return $this->workExperience;
    }

    /**
     * Set the value of workExperience
     *
     * @return  self
     */
    public function setWorkExperience($workExperience)
    {
        $this->workExperience = $workExperience;

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
     * Get the value of works
     */
    public function getWorks()
    {
        return $this->works;
    }

    /**
     * Set the value of works
     *
     * @return  self
     */
    public function setWorks($works)
    {
        $this->works = $works;

        return $this;
    }

    /**
     * Get the value of skills
     */
    public function getSkills()
    {
        return $this->skills;
    }

    /**
     * Set the value of skills
     *
     * @return  self
     */
    public function setSkills($skills)
    {
        $this->skills = $skills;

        return $this;
    }

    /**
     * Get the value of title
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set the value of title
     *
     * @return  self
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get the value of target
     */
    public function getTarget()
    {
        return $this->target;
    }

    /**
     * Set the value of target
     *
     * @return  self
     */
    public function setTarget($target)
    {
        $this->target = $target;

        return $this;
    }

    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of uid
     */
    public function getUid()
    {
        return $this->uid;
    }

    /**
     * Set the value of uid
     *
     * @return  self
     */
    public function setUid($uid)
    {
        $this->uid = $uid;

        return $this;
    }
}