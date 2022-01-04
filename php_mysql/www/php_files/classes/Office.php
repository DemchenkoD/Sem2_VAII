<?php

class Office
{
    private $id;
    private $country;
    private $city;
    private $address;
    private $phone_number;
    private $working_hours;
    public function __construct($p_id, $p_country, $p_city,  $p_address, $p_phone_number, $p_working_hours)
    {
        $this->id = $p_id;
        $this->country = $p_country;
        $this->city = $p_city;
        $this->address = $p_address;
        $this->phone_number = $p_phone_number;
        $this->working_hours = $p_working_hours;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @param mixed $country
     */
    public function setCountry($country): void
    {
        $this->country = $country;
    }

    /**
     * @return mixed
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param mixed $city
     */
    public function setCity($city): void
    {
        $this->city = $city;
    }

    /**
     * @return mixed
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param mixed $address
     */
    public function setAddress($address): void
    {
        $this->address = $address;
    }

    /**
     * @return mixed
     */
    public function getPhoneNumber()
    {
        return $this->phone_number;
    }

    /**
     * @param mixed $phone_number
     */
    public function setPhoneNumber($phone_number): void
    {
        $this->phone_number = $phone_number;
    }

    /**
     * @return mixed
     */
    public function getWorkingHours()
    {
        return $this->working_hours;
    }

    /**
     * @param mixed $working_hours
     */
    public function setWorkingHours($working_hours): void
    {
        $this->working_hours = $working_hours;
    }

}