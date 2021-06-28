<?php

declare(strict_types=1);

namespace App\Domain\Account\Entity;

class Account implements \JsonSerializable
{
    private $uid;
    private $password;
    private $mobile;
    private $sid;

    public function __construct()
    {
        $this->uid = '';
        $this->password = '';
        $this->mobile = '';
        $this->sid = '';
    }

    public function __toString()
    {
        return json_encode([
            'uid' => $this->uid,
            'password' => $this->password,
            'mobile' => $this->mobile,
            'sid' => $this->sid
        ], JSON_UNESCAPED_UNICODE);
    }

    public function jsonSerialize()
    {
        return $this->__toString();
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
        $this->sid = $this->getSid();

        return $this;
    }

    /**
     * Get the value of password
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set the value of password
     *
     * @return  self
     */
    public function setPassword($password)
    {
        $this->password = $password;

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

    /**
     * Get the value of sid
     */
    public function getSid()
    {
        return sprintf("%u", crc32("".$this->uid));
    }
}
