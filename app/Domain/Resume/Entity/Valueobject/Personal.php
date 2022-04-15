<?php

declare(strict_types=1);

namespace App\Domain\Resume\Entity\Valueobject;

class Personal implements \JsonSerializable
{
    private $name;
    private $sex;
    private $year;
    private $mobile;
    private $email;
    private $qq;

    public function __construct()
    {
        $this->name = '';
        $this->sex = '';
        $this->year = '';
        $this->mobile = '';
        $this->email = '';
        $this->qq = '';
    }

    /**
     * Get the value of name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of sex
     */
    public function getSex()
    {
        return $this->sex;
    }

    /**
     * Set the value of sex
     *
     * @return  self
     */
    public function setSex($sex)
    {
        $this->sex = $sex;

        return $this;
    }

    /**
     * Get the value of year
     */
    public function getYear()
    {
        return $this->year;
    }

    /**
     * Set the value of year
     *
     * @return  self
     */
    public function setYear($year)
    {
        $this->year = $year;

        return $this;
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
            'name' => $this->name,
            'sex' => $this->sex,
            'year' => $this->year,
            'email' => $this->email,
            'mobile' => $this->mobile,
            'qq' => $this->qq
        ], JSON_UNESCAPED_UNICODE);
    }

    public function jsonSerialize() {
        return $this->__toString();
    }
}