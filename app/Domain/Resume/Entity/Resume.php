<?php

declare(strict_types=1);

namespace App\Domain\Resume\Entity;

use App\Domain\Resume\Entity\Valueobject\ResumeType;
use App\Domain\Resume\Entity\Valueobject\ResumeStatus;

class Resume
{
    private $id;
    private $uid;

    /**
     * 付费业务形态暂时不做  
     */
    private $type;
    private $isValid;
    private $showEndTime;
    
    private $shareCounter;
    private $content;

    public function __construct()
    {
        $this->uid = "";
        $this->type = ResumeType::FREE;
        $this->isValid = ResumeStatus::VALID;
        $this->showEndTime = 0;
        $this->shareCounter = 0;
        $this->content = new Content();
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

    /**
     * Get the value of isValid
     */
    public function isValid()
    {
        return $this->isValid;
    }

    /**
     * Set the value of isValid
     *
     * @return  self
     */
    public function changeValidStatus($status)
    {
        $this->isValid = $status;

        return $this;
    }

    /**
     * Get the value of showEndTime
     */
    public function getShowEndTime()
    {
        return $this->showEndTime;
    }

    /**
     * Set the value of showEndTime
     *
     * @return  self
     */
    public function setShowEndTime($showEndTime)
    {
        $this->showEndTime = $showEndTime;

        return $this;
    }

    /**
     * Get the value of type
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set the value of type
     *
     * @return  self
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get the value of shareCounter
     */
    public function getShareCounter()
    {
        return $this->shareCounter;
    }

    public function share()
    {
        $this->shareCounter ++;

        return $this;
    }

    /**
     * Get the value of content
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set the value of content
     *
     * @return  self
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }
}