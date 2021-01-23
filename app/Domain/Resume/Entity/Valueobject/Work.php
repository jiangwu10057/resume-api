<?php

declare(strict_types=1);

namespace App\Domain\Resume\Entity\Valueobject;

class Work
{
    private $name;
    private $url;
    private $description;

    public function __construct()
    {
        $this->name = '';
        $this->url = '';
        $this->description = '';
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
     * Get the value of url
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set the value of url
     *
     * @return  self
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Get the value of description
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set the value of description
     *
     * @return  self
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    public function __toString()
    {
        return json_encode([
            'name' => $this->name,
            'url' => $this->url,
            'description' => $this->description
        ], JSON_UNESCAPED_UNICODE);
    }
}