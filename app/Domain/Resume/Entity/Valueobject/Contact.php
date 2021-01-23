<?php

declare(strict_types=1);

namespace App\Domain\Resume\Entity\Valueobject;

class Contact implements \JsonSerializable
{
    private $mobile;
    private $email;
    private $qq;

    public function __construct()
    {
        $this->mobile = '';
        $this->email = '';
        $this->qq = '';
    }
    
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

    public function __toString()
    {
        return json_encode([
            'email' => $this->email,
            'mobile' => $this->mobile,
            'qq' => $this->qq
        ], JSON_UNESCAPED_UNICODE);
    }

    public function jsonSerialize() {
        return $this->__toString();
    }
}