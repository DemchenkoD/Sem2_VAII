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

    public function getId()
    {
        return $this->id;
    }

    public function setId($id): void
    {
        $this->id = $id;
    }

    public function getCountry()
    {
        return $this->country;
    }

    public function setCountry($country): void
    {
        $this->country = $country;
    }

    public function getCity()
    {
        return $this->city;
    }

    public function setCity($city): void
    {
        $this->city = $city;
    }


    public function getAddress()
    {
        return $this->address;
    }

    public function setAddress($address): void
    {
        $this->address = $address;
    }


    public function getPhoneNumber()
    {
        return $this->phone_number;
    }

    public function setPhoneNumber($phone_number): void
    {
        $this->phone_number = $phone_number;
    }

    public function getWorkingHours()
    {
        return $this->working_hours;
    }

    public function setWorkingHours($working_hours): void
    {
        $this->working_hours = $working_hours;
    }

}