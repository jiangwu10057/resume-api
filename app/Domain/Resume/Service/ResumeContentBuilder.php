<?php

declare(strict_types=1);

namespace App\Domain\Resume\Service;

use App\Domain\Resume\Entity\Content;
use App\Domain\Resume\Entity\Valueobject\Contact;
use App\Domain\Resume\Entity\Valueobject\Personal;

class ResumeContentBuilder
{
    private $title = '';
    private $target = '';
    private $contact;
    private $personal;
    private $workExperience = [];
    private $education = [];
    private $works = [];
    private $skills = [];

    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    public function setTarget($target)
    {
        $this->target = $target;

        return $this;
    }

    public function setContact($contact)
    {
        $this->contact = $contact;
        
        return $this;
    }

    public function setPersonal($personal)
    {
        $this->personal = $personal;
        
        return $this;
    }

    public function setWorkExperience($workExperience)
    {
        $this->workExperience = $workExperience;

        return $this;
    }

    public function setEducation($education)
    {
        $this->education = $education;

        return $this;
    }

    public function setWorks($works)
    {
        $this->works = $works;

        return $this;
    }

    public function setSkills($skills)
    {
        $this->skills = $skills;

        return $this;
    }

    private function buildContact($data)
    {
        $contact = new contact();
        $contact->setMobile($data['mobile']);
        $contact->setEmail($data['email']);
        $contact->setQq($data['qq']);

        return $contact;
    }

    private function buildPersonal($data)
    {
        $personal = new Personal();

        $personal->setName($data['name']);
        $personal->setSex($data['sex']);
        $personal->setYear($data['year']);
        $personal->setEducation($data['education']);

        return $personal;
    }

    private function buildWorkExperience($data)
    {
        $workExperience = [];


        return $workExperience;
    }

    private function buildEducation($data)
    {
        $education = [];

        return $education;
    }

    private function buildWorks($data)
    {
        $works = [];

        return $works;
    }

    private function buildSkills($data)
    {
        $skills = [];

        return $skills;
    }

    public function parse($data)
    {
        $this->setTitle($data['title'] ?? '');
        $this->setTarget($data['target'] ?? '');
        $this->setContact($this->buildContact($data));
        $this->setPersonal($this->buildPersonal($data));
        $this->setWorkExperience($this->buildWorkExperience($data));
        $this->setEducation($this->buildEducation($data));
        $this->setWorks($this->buildWorks($data));
        $this->setSkills($this->buildSkills($data));

        return $this;
    }

    public function build()
    {
        $content = new Content();

        $content->setTitle($this->title);
        $content->setTarget($this->target);
        $content->setContact($this->contact ?? new Contact());
        $content->setPersonal($this->personal ?? new Personal());
        $content->setWorkExperience($this->workExperience);
        $content->setEducation($this->education);
        $content->setWorks($this->works);
        $content->setSkills($this->skills);

        return $content;
    }
}