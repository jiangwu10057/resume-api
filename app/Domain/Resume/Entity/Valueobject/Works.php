<?php

declare(strict_types=1);

namespace App\Domain\Resume\Entity\Valueobject;

class Works
{
    private $opensources;
    private $articles;
    private $speeches;

    public function __construct()
    {
        $this->opensources = [];
        $this->articles = [];
        $this->speeches = [];
    }

    /**
     * Get the value of opensources
     */
    public function getOpensources()
    {
        return $this->opensources;
    }

    /**
     * Set the value of opensources
     *
     * @return  self
     */
    public function setOpensources($opensources)
    {
        $this->opensources = $opensources;

        return $this;
    }

    /**
     * Get the value of articles
     */
    public function getArticles()
    {
        return $this->articles;
    }

    /**
     * Set the value of articles
     *
     * @return  self
     */
    public function setArticles($articles)
    {
        $this->articles = $articles;

        return $this;
    }

    /**
     * Get the value of speeches
     */
    public function getSpeeches()
    {
        return $this->speeches;
    }

    /**
     * Set the value of speeches
     *
     * @return  self
     */
    public function setSpeeches($speeches)
    {
        $this->speeches = $speeches;

        return $this;
    }

    public function __toString()
    {
        return json_encode([
            'opensources' => $this->opensources,
            'articles' => $this->articles,
            'speeches' => $this->speeches
        ], JSON_UNESCAPED_UNICODE);
    }
}