<?php

declare(strict_types=1);

namespace App\Domain\Resume\Service;

use App\Constants\ErrorCode;
use App\Domain\Resume\Entity\Resume;
use App\Domain\Resume\Entity\Valueobject\ResumeStatus;
use App\Domain\Resume\Entity\Valueobject\ResumeType;
use App\Exception\BusinessException;

class ResumeBuilder
{
    private $content;
    private $showEndTime;

    public function setContent($content)
    {
        $this->content = $content;
    }

    public function setShowEndTime($time)
    {
        $this->showEndTime = $time;

        return $this;
    }

    public function transformFromModel($model)
    {
        $resume = new Resume();
        $resume->setType(ResumeType::FREE);
        $resume->changeValidStatus(ResumeStatus::PREVIEW);
        $resume->setShowEndTime(0);
        // $resume->setContent();
    }

    public function buildPreview()
    {
        $resume = new Resume();
        $resume->setType(ResumeType::FREE);
        $resume->changeValidStatus(ResumeStatus::PREVIEW);
        $resume->setShowEndTime(0);
        $resume->setContent($this->content);

        return $resume;
    }

    public function buildFree()
    {
        $resume = new Resume();
        $resume->setType(ResumeType::FREE);
        $resume->changeValidStatus(ResumeStatus::VALID);
        $resume->setShowEndTime(0);
        $resume->setContent($this->content);

        return $resume;
    }

    public function buildFee()
    {
        $resume = new Resume();

        $resume->changeValidStatus(ResumeStatus::VALID);

        if(!is_int($this->showEndTime)){
            throw new BusinessException(ErrorCode::PARAMETER_TYPE_ERROR);
        }
        if($this->showEndTime < time()){
            $resume->changeValidStatus(ResumeStatus::OUTDATED);
        }

        $resume->setType(ResumeType::FEE);
        $resume->setContent($this->content);
        return $this->resume;
    }
}