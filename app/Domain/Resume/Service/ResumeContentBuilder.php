<?php

declare(strict_types=1);

namespace App\Domain\Resume\Service;

use App\Domain\Resume\Entity\Content;
use App\Domain\Resume\Entity\Valueobject\Contact;
use App\Domain\Resume\Entity\Valueobject\Except;
use App\Domain\Resume\Entity\Valueobject\Skill;
use App\Domain\Resume\Entity\Valueobject\Work;
use App\Domain\Resume\Entity\Valueobject\Works;
use App\Domain\Resume\Entity\Valueobject\Experience\Company;
use App\Domain\Resume\Entity\Valueobject\Experience\Project;
use App\Domain\Resume\Entity\Valueobject\Experience\School;
use App\Domain\Resume\Entity\Valueobject\Personal;

class ResumeContentBuilder
{
    private $id = 0;
    private $uid = '';
    private $title = '';
    private $target = '';
    private $contact;
    private $personal;
    private $workExperience = [];
    private $education = [];
    private $works = [];
    private $skills = [];
    private $except = [];

    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    public function setUid($uid)
    {
        $this->uid = $uid;

        return $this;
    }

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

    public function setExcept($except)
    {
        $this->except = $except;

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

        if (empty($data['contact'])) {
            return $contact;
        }

        $data = $data['contact'];

        $contact->setMobile($data['mobile'] ?? '');
        $contact->setEmail($data['email'] ?? '');
        $contact->setQq($data['qq'] ?? '');

        return $contact;
    }

    private function buildExcept($data)
    {
        $except = new Except();

        if (empty($data['except'])) {
            return $except;
        }

        $data = $data['except'];

        $except->setPosition($data['position'] ?? '');
        $except->setSalary($data['salary'] ?? '');
        $except->setCity($data['city'] ?? '');

        return $except;
    }

    private function buildPersonal($data)
    {
        $personal = new Personal();

        if (empty($data['personal'])) {
            return $personal;
        }

        $data = $data['personal'];

        $personal->setName($data['name'] ?? '');
        $personal->setSex($data['sex'] ?? '');
        $personal->setEducation($data['education'] ?? '');
        $personal->setYear($data['year'] ?? '');

        return $personal;
    }

    private function buildWorkExperience($data)
    {
        $workExperience = [];

        if (empty($data['work_experience'])) {
            return $workExperience;
        }

        foreach ($data['work_experience'] as $one) {
            $company = new Company();
            $company->setCompany($one['company'] ?? '');
            $company->setPosition($one['position'] ?? '');
            $company->setTimeperiod($one['timeperiod'] ?? '');
            $company->setProjects($this->buildProjectExperience($one['experiences']));

            $workExperience[] = $company;
        }

        return $workExperience;
    }

    private function buildProjectExperience($data)
    {
        $projects = [];
        if (empty($data)) {
            return $projects;
        }

        foreach ($data as $project) {
            $projectObj = new Project();
            $projectObj->setName($project['project'] ?? '');
            $projectObj->setRole($project['role'] ?? '');
            $projectObj->setDescription($project['description'] ?? '');
            $projects[] = $projectObj;
        }

        return $projects;
    }

    private function buildEducation($data)
    {
        $education = [];

        if (empty($data['education'])) {
            return $education;
        }

        foreach ($data['education'] as $one) {
            $school = new School();

            $school->setName($one['school'] ?? '');
            $school->setEducation($one['education'] ?? '');
            $school->setMajor($one['major'] ?? '');
            $school->setEntrance($one['entrance'] ?? '');
            $school->setGraduation($one['graduation'] ?? '');
            $school->setDescription($one['description'] ?? '');

            $education[] = $school;
        }


        return $education;
    }

    private function buildWorks($data)
    {
        $works = new Works();

        if (empty($data['works'])) {
            return $works;
        }

        $works->setOpensources($this->buildWork($data['works']['opensources']));
        $works->setArticles($this->buildWork($data['works']['articles']));
        $works->setSpeeches($this->buildWork($data['works']['speeches']));

        return $works;
    }

    private function buildWork($data)
    {
        $works = [];

        if (empty($data)) {
            return $works;
        }

        foreach ($data as $one) {
            $work = new Work();
            $work->setName($one['name'] ?? '');
            $work->setUrl($one['url'] ?? '');
            $work->setDescription($one['description'] ?? '');

            $works[] = $work;
        }

        return $works;
    }

    private function buildSkills($data)
    {
        $skills = [];

        if (empty($data['skills'])) {
            return $skills;
        }

        foreach ($data['skills'] as $one) {
            $skill = new Skill();

            $skill->setName($one['name'] ?? '');
            $skill->setDegree($one['degree'] ?? 0);

            $skills[] = $skill;
        }

        return $skills;
    }

    public function parse($data)
    {
        $this->setId($data['id'] ?? 0);
        $this->setUid($data['uid'] ?? '');
        $this->setTitle($data['title'] ?? '');
        $this->setTarget($data['target'] ?? '');
        $this->setContact($this->buildContact($data));
        $this->setExcept($this->buildExcept($data));
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

        if($this->id){
            $content->setId($this->id);
        }

        $content->setUid($this->uid);
        $content->setTitle($this->title);
        $content->setTarget($this->target);
        $content->setExcept($this->except);
        $content->setContact($this->contact ?? new Contact());
        $content->setPersonal($this->personal ?? new Personal());
        $content->setWorkExperience($this->workExperience);
        $content->setEducation($this->education);
        $content->setWorks($this->works);
        $content->setSkills($this->skills);

        return $content;
    }
}
