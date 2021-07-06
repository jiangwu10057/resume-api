<?php

declare(strict_types=1);

namespace App\Domain\User\Entity;

class MPCode implements \JsonSerializable
{
    private $id;
    private $uid;
    private $content;

    public function __construct()
    {
        $this->id = 0;
        $this->uid = 0;
        $this->content = '';
    }

    public function __toString()
    {
        return json_encode([
            'id' => $this->id,
            'uid' => $this->uid,
            'content' => $this->content,
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
