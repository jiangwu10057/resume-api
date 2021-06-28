<?php

declare(strict_types=1);

namespace App\Domain\Account\Entity\Valueobject;

abstract class Social implements \JsonSerializable
{
    private $id;
    private $uid;
    private $openid;
    private $avatarUrl;
    private $address;
    private $gender;
    private $nickName;
    private $source;
    private $sid;

    public function __construct()
    {
        $this->id = '';
        $this->uid = '';
        $this->avatarUrl = '';
        $this->address = new Address();
        $this->gender = '';
        $this->nickName = '';
        $this->openid = '';
        $this->sid = '';
    }

    public function __toString()
    {
        return json_encode([
            'openid' => $this->openid,
            'avatarUrl' => $this->avatarUrl,
            'address' => $this->address,
            'gender' => $this->gender,
            'nickName' => $this->nickName,
            'source' => $this->source,
            'sid' => $this->sid,
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
     * Get the value of source
     */
    public function getSource()
    {
        return $this->source;
    }

    /**
     * Set the value of source
     *
     * @return  self
     */
    protected function setSource($source)
    {
        $this->source = $source;

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