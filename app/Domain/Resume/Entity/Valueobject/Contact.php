<?php

declare(strict_types=1);

namespace App\Domain\Resume\Entity\Valueobject;

class Contact
{
    private $mobile;
    private $email;
    private $qq;
    
    /**
     * Get the value of qq
     */
    public function getQq()
    {
        return $this->qq;
    }

    /**
     * Set the value of qq
     *
     * @return  self
     */
    public function setQq($qq)
    {
        $this->qq = $qq;

        return $this;
    }

    /**
     * Get the value of email
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of mobile
     */
    public function getMobile()
    {
        return $this->mobile;
    }

    /**
     * Set the value of mobile
     *
     * @return  self
     */
    public function setMobile($mobile)
    {
        $this->mobile = $mobile;

        return $this;
    }
}