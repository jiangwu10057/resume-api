<?php

declare(strict_types=1);

namespace App\Domain\Resume\Entity\Valueobject;

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

    /**
     * Set the value of shareCounter
     *
     * @return  self
     */
    public function setShareCounter($shareCounter)
    {
        $this->shareCounter = $shareCounter;

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

    public function generateFree()
    {

    }

    /**
     * todo
     */
    public function generateFee()
    {

    }

    public function shared($id)
    {

    }

    public function preview()
    {
        
    }
}