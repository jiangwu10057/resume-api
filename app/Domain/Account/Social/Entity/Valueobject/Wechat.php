<?php

declare(strict_types=1);

namespace App\Domain\Account\Socail\Entity\Valueobject;

class Wechat implements Third
{
    private $avatarUrl;
    private $address;
    private $gender;
    private $nickName;
    private $openid;
    private $source;

    public function __construct()
    {
        $this->avatarUrl = '';
        $this->address = new Address();
        $this->gender = '';
        $this->nickName = '';
        $this->openid = '';
        $this->uid = '';
        $this->source = 1;
    }

    public function __toString()
    {
        return json_encode([
            'avatarUrl' => $this->avatarUrl,
            'address' => $this->address,
            'gender' => $this->gender,
            'nickName' => $this->nickName,
            'openid' => $this->openid,
            'uid' => $this->uid,
        ], JSON_UNESCAPED_UNICODE);
    }

    public function jsonSerialize() {
        return $this->__toString();
    }

    /**
     * Get the value of avatarUrl
     */
    public function getAvatarUrl()
    {
        return $this->avatarUrl;
    }

    /**
     * Set the value of avatarUrl
     *
     * @return  self
     */
    public function setAvatarUrl($avatarUrl)
    {
        $this->avatarUrl = $avatarUrl;

        return $this;
    }

    /**
     * Get the value of nickName
     */
    public function getNickName()
    {
        return $this->nickName;
    }

    /**
     * Set the value of nickName
     *
     * @return  self
     */
    public function setNickName($nickName)
    {
        $this->nickName = $nickName;

        return $this;
    }

    /**
     * Get the value of gender
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * Set the value of gender
     *
     * @return  self
     */
    public function setGender($gender)
    {
        $this->gender = $gender;

        return $this;
    }

    /**
     * Get the value of address
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set the value of address
     *
     * @return  self
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get the value of openid
     */
    public function getOpenid()
    {
        return $this->openid;
    }

    /**
     * Set the value of openid
     *
     * @return  self
     */
    public function setOpenid($openid)
    {
        $this->openid = $openid;

        return $this;
    }

    public function getSource()
    {
        return $this->source;
    }
}