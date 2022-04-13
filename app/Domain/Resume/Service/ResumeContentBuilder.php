<?php

declare(strict_types=1);

namespace App\Domain\Resume\Service;

use App\Domain\Resume\Entity\Content;
use App\Domain\Resume\Entity\Valueobject\Except;
use App\Domain\Resume\Entity\Valueobject\Skill;
use App\Domain\Resume\Entity\Valueobject\Work;
use App\Domain\Resume\Entity\Valueobject\Experience\Company;
use App\Domain\Resume\Entity\Valueobject\Experience\Project;
use App\Domain\Resume\Entity\Valueobject\Experience\School;
use App\Domain\Resume\Entity\Valueobject\Personal;

class ResumeContentBuilder
{
    private $id = 0;
    private $uid = '';
    private $personal;
    private $work = [];
    private $education = [];
    private $works = [];
    private $skills = [];
    private $except = [];
    private $projects = [];

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

    public function setWork($work)
    {
        $this->work = $work;

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
    
    public function setProjects($projects)
    {
        $this->projects = $projects;

        return $this;
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
        $personal->setMobile($data['mobile'] ?? '');
        $personal->setEmail($data['email'] ?? '');

        return $personal;
    }

    private function buildWorkExperience($data)
    {
        $workExperience = [];

        if (empty($data['work'])) {
            return $workExperience;
        }

        foreach ($data['work'] as $one) {
            $company = new Company();
            $company->setName($one['name'] ?? '');
            $company->setJob($one['job'] ?? '');
            $company->setEntrance($one['entrance'] ?? '');
            $company->setLeave($one['leave'] ?? '');
            $company->setDescription($one['description'] ?? '');

            $workExperience[] = $company;
        }

        return $workExperience;
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
        $works = [];

        if (empty($data['works'])) {
            return $works;
        }

        foreach ($data['works'] as $one) {
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

    private function buildProjects($data)
    {
        $projects = [];

        if(empty($data['projects'])){
            return $projects;
        }

        foreach ($data['projects'] as $one) {
            $project = new Project();
            
            $project->setType($one['type'] ?? 1);
            $project->setCompany($one['company'] ?? '');
            $project->setName($one['name'] ?? '');
            $project->setRole($one['role'] ?? '');
            $project->setStart($one['start'] ?? '');
            $project->setEnd($one['end'] ?? '');
            $project->setDescription($one['description'] ?? '');
            $project->setUrl($one['url'] ?? '');

            $projects[] = $project;
        }

        return $projects;
    }

    public function parse($data)
    {
        $this->setId($data['id'] ?? 0);
        $this->setUid($data['uid'] ?? '');
        $this->setProjects($this->buildProjects($data));
        $this->setExcept($this->buildExcept($data));
        $this->setPersonal($this->buildPersonal($data));
        $this->setWork($this->buildWorkExperience($data));
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
        $content->setExcept($this->except);
        $content->setPersonal($this->personal ?? new Personal());
        $content->setWork($this->work);
        $content->setEducation($this->education);
        $content->setWorks($this->works);
        $content->setSkills($this->skills);
        $content->setProjects($this->projects);

        return $content;
    }
}
