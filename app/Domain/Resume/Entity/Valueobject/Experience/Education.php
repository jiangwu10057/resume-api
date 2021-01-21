<?php

declare(strict_types=1);

namespace App\Domain\Resume\Entity\Valueobject\Experience;

class Education
{
    private $schools;

    /**
     * Get the value of schools
     */
    public function getSchools()
    {
        return $this->schools;
    }

    /**
     * Set the value of schools
     *
     * @return  self
     */
    public function setSchools($schools)
    {
        $this->schools = $schools;

        return $this;
    }

    public function toString()
    {
        return json_encode([
            'schools' => $this->schools
        ], JSON_UNESCAPED_UNICODE);
    }
}