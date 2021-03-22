<?php

declare(strict_types=1);

namespace App\Domain\Account\Socail\Entity\Valueobject;

class Address implements \JsonSerializable
{
    private $city;
    private $province;
    private $country;

    public function __construct()
    {
        $this->city = '';
        $this->province = '';
        $this->country = '';
    }

    public function __toString()
    {
        return json_encode([
            'city' => $this->city,
            'province' => $this->province,
            'country' => $this->country,
        ], JSON_UNESCAPED_UNICODE);
    }

    public function jsonSerialize()
    {
        return $this->__toString();
    }

    /**
     * Get the value of city
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set the value of city
     *
     * @return  self
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get the value of province
     */
    public function getProvince()
    {
        return $this->province;
    }

    /**
     * Set the value of province
     *
     * @return  self
     */
    public function setProvince($province)
    {
        $this->province = $province;

        return $this;
    }

    /**
     * Get the value of country
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Set the value of country
     *
     * @return  self
     */
    public function setCountry($country)
    {
        $this->country = $country;

        return $this;
    }
}
