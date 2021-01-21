<?php

declare(strict_types=1);

namespace App\Domain\Resume\Service;

use App\Constants\ErrorCode;
use App\Domain\Resume\Entity\Content;
use App\Domain\Resume\Entity\Valueobject\ResumeStatus;
use App\Domain\Resume\Entity\Valueobject\ResumeType;
use App\Exception\BusinessException;

class ResumeContentBuilder
{

    private $content;
    private $resume;
    private $share;

    public function __construct()
    {
        $this->content = new Content();
    }

    public function setTitle($title)
    {
        $this->content->setTitle($title);

        return $this;
    }

    public function setTarget($target)
    {
        $this->content->setTarget($target);

        return $this;
    }

    public function setContact($contact)
    {
        $this->content->setContact($contact);
        
        return $this;
    }

    public function setPersonal($personal)
    {
        $this->content->setPersonal($personal);
        
        return $this;
    }

    public function setWorkExperience($workExperience)
    {
        $this->content->setWorkExperience($workExperience);

        return $this;
    }

    public function setEducation($education)
    {
        $this->content->setEducation($education);

        return $this;
    }

    public function setWorks($works)
    {
        $this->content->setWorks($works);

        return $this;
    }

    public function setSkills($skills)
    {
        $this->content->setSkills($skills);
        return $this;
    }

    public function generateContent()
    {
        return $this->content;
    }

    public function generatePreviewResume()
    {
        $this->resume->setType(ResumeType::FREE);
        $this->resume->changeValidStatus(ResumeStatus::PREVIEW);
        $this->resume->setShowEndTime(0);
        $this->resume->setShareCounter(0);
        $this->resume->setContent($this->content);

        return $this->resume;
    }

    public function generateFreeResume()
    {
        $this->resume->setType(ResumeType::FREE);
        $this->resume->changeValidStatus(ResumeStatus::VALID);
        $this->resume->setShowEndTime(0);
        $this->resume->setShareCounter(0);
        $this->resume->setContent($this->content);

        return $this->resume;
    }

    public function setShowEndTime($time)
    {
        if(!is_int($time)){
            new BusinessException(ErrorCode::PARAMETER_TYPE_ERROR);
        }

        $this->resume->setShowEndTime($time);

        if($time < time()){
            $this->resume->changeValidStatus(ResumeStatus::OUTDATED);
        }

        return $this;
    }

    public function generateFeeResume()
    {
        $this->resume->setType(ResumeType::FEE);
        $this->resume->setShareCounter(0);
        $this->resume->setContent($this->content);
        return $this->resume;
    }
}